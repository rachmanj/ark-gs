<?php

namespace App\Http\Controllers;

use App\Budget;
use App\Incoming;
use App\Migi;
use App\Powitheta;
use App\Progresmr;
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
        $latest_record = Powitheta::latest('posting_date')->first();

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

        $npi_incoming_011 = $this->incoming_qty($this_month, ['011C']);
        $npi_incoming_017 = $this->incoming_qty($this_month, ['017C']);
        $npi_incoming_APS = $this->incoming_qty($this_month, ['APS']);
        $npi_incoming_all = $this->incoming_qty($this_month, $all_project);

        $npi_outgoing_011 = $this->outgoing_qty($this_month, ['011C']);
        $npi_outgoing_017 = $this->outgoing_qty($this_month, ['017C']);
        $npi_outgoing_APS = $this->outgoing_qty($this_month, ['APS']);
        $npi_outgoing_all = $this->outgoing_qty($this_month, $all_project);

        $mr_to_mi_all = $this->mr_to_mi($all_project);

        // dd($npi_outgoing);

        return view('dashboard.index', compact(
            'last_month',
            'latest_record',
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
            'npi_incoming_011',
            'npi_incoming_017',
            'npi_incoming_APS',
            'npi_incoming_all',
            'npi_outgoing_011',
            'npi_outgoing_017',
            'npi_outgoing_APS',
            'npi_outgoing_all',
            'mr_to_mi_all',
        ));
    }

    public function page_2()
    {
        $latest_record = Powitheta::latest('posting_date')->first();
        $this_month = Carbon::now();
        $last_month = Carbon::now()->subMonths(1);
        $all_project = ['011C', '017C'];

        $mr_to_pr_011 = $this->mr_to_pr(['011C']);
        $mr_to_pr_017 = $this->mr_to_pr(['017C']);
        $mr_to_pr_all = $this->mr_to_pr($all_project);

        $pr_to_po_011 = $this->pr_to_po(['011C']);
        $pr_to_po_017 = $this->pr_to_po(['017C']);
        $pr_to_po_all = $this->pr_to_po($all_project);

        $poeta_to_grpo_011 = $this->poeta_to_grpo(['011C']);
        $poeta_to_grpo_017 = $this->poeta_to_grpo(['017C']);
        $poeta_to_grpo_all = $this->poeta_to_grpo($all_project);

        $grpo_to_iti_011 = $this->grpo_to_iti(['011C']);
        $grpo_to_iti_017 = $this->grpo_to_iti(['017C']);
        $grpo_to_iti_all = $this->grpo_to_iti($all_project);

        $mr_to_mi_011 = $this->mr_to_mi(['011C']);
        $mr_to_mi_017 = $this->mr_to_mi(['017C']);
        $mr_to_mi_all = $this->mr_to_mi($all_project);

        $outs_mr_011 = $this->outs_mr(['011C']);
        $outs_mr_017 = $this->outs_mr(['017C']);

        // dd($grpo_to_iti_017->whereIn('days', [0, 1, 2]));

        return view('dashboard.page_2', compact(
            'latest_record',
            'mr_to_pr_011',
            'mr_to_pr_017',
            'mr_to_pr_all',
            'pr_to_po_011',
            'pr_to_po_017',
            'pr_to_po_all',
            'poeta_to_grpo_011',
            'poeta_to_grpo_017',
            'poeta_to_grpo_all',
            'grpo_to_iti_011',
            'grpo_to_iti_017',
            'grpo_to_iti_all',
            'mr_to_mi_011',
            'mr_to_mi_017',
            'mr_to_mi_all',
            'outs_mr_011',
            'outs_mr_017',
        ));
    }

    public function page_3()
    {
        $this_month = Carbon::now();
        $last_month = Carbon::now()->subMonths(1);
        $all_project = ['011C', '017C', 'APS'];

        $npi_incoming_011 = $this->incoming_qty($last_month, ['011C']);
        $npi_incoming_017 = $this->incoming_qty($last_month, ['017C']);
        $npi_incoming_APS = $this->incoming_qty($last_month, ['APS']);
        $npi_incoming_all = $this->incoming_qty($last_month, $all_project);

        $npi_outgoing_011 = $this->outgoing_qty($last_month, ['011C']);
        $npi_outgoing_017 = $this->outgoing_qty($last_month, ['017C']);
        $npi_outgoing_APS = $this->outgoing_qty($last_month, ['APS']);
        $npi_outgoing_all = $this->outgoing_qty($last_month, $all_project);

        // dd($outs_mr_011); //

        return view('dashboard.page_3', compact(
            'npi_incoming_011',
            'npi_incoming_017',
            'npi_incoming_APS',
            'npi_incoming_all',
            'npi_outgoing_011',
            'npi_outgoing_017',
            'npi_outgoing_APS',
            'npi_outgoing_all',
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

    public function incoming_qty($month, $project)
    {
        $list = Incoming::whereMonth('posting_date', '=', $month);
        $incl_deptcode = ['40', '50', '60', '140'];

        $excl_itemcode = ['%EX-FUEL%', '%OLA%', '%EX-%', '%SA-%', '%SV-%', '%CONS%']; // , 
        foreach ($excl_itemcode as $e) {
            $excl_itemcode_arr[] = ['item_code', 'not like', $e];
        }

        $excl_uom = ['%L%', '%M%', '%CM%'];
        foreach ($excl_uom as $e) {
            $excl_uom_arr[] = ['uom', 'not like', $e];
        }

        return $list->whereIn('project_code', $project)
            ->whereIn('dept_code', $incl_deptcode)
            ->where($excl_itemcode_arr)
            ->where($excl_uom_arr)
            ->sum('qty');
    }

    public function outgoing_qty($month, $project)
    {
        $list = Migi::whereMonth('posting_date', '=', $month);;
        $incl_deptcode = ['40', '50', '60', '140'];

        $excl_itemcode = ['%EX-FUEL%', '%OLA%', '%EX-%', '%SA-%', '%SV-%', '%CONS%']; // , 
        foreach ($excl_itemcode as $e) {
            $excl_itemcode_arr[] = ['item_code', 'not like', $e];
        }

        $excl_uom = ['%L%', '%M%', '%CM%'];
        foreach ($excl_uom as $e) {
            $excl_uom_arr[] = ['uom', 'not like', $e];
        }

        return $list->whereIn('project_code', $project)
            ->whereIn('dept_code', $incl_deptcode)
            ->where($excl_itemcode_arr)
            ->where($excl_uom_arr)
            ->sum('qty');
    }

    public function mr_to_pr($project)
    {
        $list = DB::table('progresmrs')->selectRaw('project_code, mr_creation, pr_creation, datediff(pr_creation, mr_creation) as days')
            ->whereIn('project_code', $project)
            ->whereNotNull('pr_no')
            ->get();

        return $list;
    }

    public function pr_to_po($project)
    {
        $list = DB::table('progresmrs')->selectRaw('project_code, pr_creation, po_creation, datediff(po_creation, pr_creation) as days')
            ->whereIn('project_code', $project)
            ->whereNotNull('po_no')
            ->get();

        return $list;
    }

    public function poeta_to_grpo($project)
    {
        $list = DB::table('progresmrs')->selectRaw('project_code, po_eta, grpo_date, datediff(grpo_date, po_eta) as days')
            ->whereIn('project_code', $project)
            ->whereNotNull('grpo_no')
            ->get();

        return $list;
    }

    public function grpo_to_iti($project)
    {
        $list = DB::table('progresmrs')->selectRaw('project_code, grpo_date, iti_date, datediff(iti_date, grpo_date) as days')
            ->whereIn('project_code', $project)
            ->whereNotNull('iti_no')
            ->get();

        return $list;
    }

    public function mr_to_mi($project)
    {
        $list = DB::table('progresmrs')->selectRaw('project_code, mr_date, mi_date, datediff(mi_date, mr_date) as days')
            ->whereIn('project_code', $project)
            ->whereNotNull('mi_no')
            ->get();

        return $list;
    }

    public function outs_mr($project)
    {
        // $list = DB::table('progresmrs')->selectRaw('datediff(now(), mr_date) as days')
        //     ->whereIn('project_code', $project)
        //     ->whereNull('po_no')
        //     ->groupBy('days')
        //     ->get();

        // $list = DB::table('progresmrs')->selectRaw('mr_date, datediff(now(), mr_date) as days')
        //     ->whereIn('project_code', $project)
        //     ->whereNull('po_no')
        //     ->groupBy('mr_date')
        //     ->orderBy('days')
        //     ->get();

        // $list = Progresmr::selectRaw('mr_date, datediff(now(), mr_date) as days')
        //     ->whereIn('project_code', $project)
        //     ->whereNull('po_no')
        //     ->groupBy('mr_date')
        //     ->get();

        $list = DB::table('progresmrs')
            ->select(DB::raw('mr_date'), DB::raw('count(*) as record_count'), DB::raw('datediff(now(), mr_date) as days'))
            ->whereIn('project_code', $project)
            ->where('mr_status', 'Open')
            ->groupBy('mr_date')
            ->get();

        return $list;
    }

    public function test()
    {
        $list = DB::table('progresmrs')->selectRaw('*, datediff(iti_date, grpo_date) as days')
            ->whereIn('project_code', ['017C'])
            ->whereNotNull('iti_no')
            ->get();

        return $list;
    }
}
