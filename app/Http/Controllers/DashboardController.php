<?php

namespace App\Http\Controllers;

use App\Budget;
use App\Powitheta;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $this_month = Carbon::now();
        $last_month = Carbon::now()->subMonths(1);
        $all_project = ['011C', '017C', 'APS'];

        $po_amount_011_this_month = $this->po_sent_amount($this_month, ['011C']);
        $po_amount_017_this_month = $this->po_sent_amount($this_month, ['017C']);
        $po_amount_APS_this_month = $this->po_sent_amount($this_month, ['APS']);
        $po_amount_all_this_month = $this->po_sent_amount($this_month, $all_project);

        $po_amount_011_last_month = $this->po_sent_amount($last_month, ['011C']);
        $po_amount_017_last_month = $this->po_sent_amount($last_month, ['017C']);
        $po_amount_APS_last_month = $this->po_sent_amount($last_month, ['APS']);

        $plant_budget_011_this_month = $this->plant_budget($this_month, ['011C']);
        $plant_budget_017_this_month = $this->plant_budget($this_month, ['017C']);
        $plant_budget_APS_this_month = $this->plant_budget($this_month, ['APS']);
        $plant_budget_all_this_month = $this->plant_budget($this_month, $all_project);

        $grpo_011_amount = $this->grpo_amount($this_month, ['011C']);
        $grpo_017_amount = $this->grpo_amount($this_month, ['017C']);
        $grpo_APS_amount = $this->grpo_amount($this_month, ['APS']);
        $grpo_all_amount = $this->grpo_amount($this_month, $all_project);

        // dd($grpo_011_amount);

        return view('dashboard.index', compact(
            'po_amount_011_this_month',
            'po_amount_017_this_month',
            'po_amount_APS_this_month',
            'po_amount_all_this_month',
            'plant_budget_011_this_month',
            'plant_budget_017_this_month',
            'plant_budget_APS_this_month',
            'plant_budget_all_this_month',
            'grpo_011_amount',
            'grpo_017_amount',
            'grpo_APS_amount',
            'grpo_all_amount',
        ));
    }

    public function po_sent_amount($month, $project)
    {
        $list = Powitheta::whereMonth('posting_date', '=', $month);
        $incl_deptcode = ['40', '50', '60', '140'];

        $excl_itemcode = ['%EX-FUEL%', '%OLA%', '%EX-%', '%SA-%'];
        foreach ($excl_itemcode as $e) {
            $excl_itemcode_arr[] = ['item_code', 'not like', $e];
        }

        return $list->whereIn('project_code', $project)
            ->whereIn('dept_code', $incl_deptcode)
            ->where($excl_itemcode_arr)
            ->where('po_delivery_status', 'Delivered')
            ->where('po_status', '!=', 'Cancelled')
            ->sum('item_amount');
    }

    public function plant_budget($month, $project)
    {
        return Budget::whereIn('project_code', $project)
            ->where('budgettype_id', 1)
            ->whereMonth('date', $month)
            ->sum('amount');
    }

    public function grpo_amount($month, $project)
    {
        $list = Powitheta::whereMonth('grpo_date', '=', $month)->whereMonth('posting_date', '=', $month);
        $incl_deptcode = ['40', '50', '60', '140'];

        $excl_itemcode = ['%EX-FUEL%', '%OLA%', '%EX-%', '%SA-%'];
        foreach ($excl_itemcode as $e) {
            $excl_itemcode_arr[] = ['item_code', 'not like', $e];
        }

        return $list->whereIn('project_code', $project)
            ->whereIn('dept_code', $incl_deptcode)
            ->where($excl_itemcode_arr)
            ->whereNotNull('grpo_no')
            // ->where('po_delivery_status', 'Delivered')
            // ->where('po_status', '!=', 'Cancelled')
            ->sum('item_amount');
    }
}
