<?php

namespace App\Http\Controllers;

use App\Budget;
use App\Grpo;
use App\Powitheta;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $date = Carbon::now();
        $all_project = ['011C', '017C', 'APS'];
        $data_date = $date->subDay();

        $po_amount_011_this_month = $this->po_sent_amount($date, ['011C']);
        $po_amount_017_this_month = $this->po_sent_amount($date, ['017C']);
        $po_amount_APS_this_month = $this->po_sent_amount($date, ['APS']);
        $po_amount_all_this_month = $this->po_sent_amount($date, $all_project);

        $plant_budget_011_this_month = $this->plant_budget($date, ['011C']);
        $plant_budget_017_this_month = $this->plant_budget($date, ['017C']);
        $plant_budget_APS_this_month = $this->plant_budget($date, ['APS']);
        $plant_budget_all_this_month = $this->plant_budget($date, $all_project);

        $grpo_011_amount = $this->grpo_amount($date, ['011C']);
        $grpo_017_amount = $this->grpo_amount($date, ['017C']);
        $grpo_APS_amount = $this->grpo_amount($date, ['APS']);
        $grpo_all_amount = $this->grpo_amount($date, $all_project);

        $npi_in_011 = $this->incoming_qty($date, ['011C']);
        $npi_in_017 = $this->incoming_qty($date, ['017C']);
        $npi_in_APS = $this->incoming_qty($date, ['APS']);
        $npi_in_all = $this->incoming_qty($date, $all_project);

        $npi_out_011 = $this->outgoing_qty($date, ['011C']);
        $npi_out_017 = $this->outgoing_qty($date, ['017C']);
        $npi_out_APS = $this->outgoing_qty($date, ['APS']);
        $npi_out_all = $this->outgoing_qty($date, $all_project);

        $mr_to_mi_all = $this->mr_to_mi($all_project);

        return view('dashboard.index', compact(
            'data_date',
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
            'npi_in_011',
            'npi_in_017',
            'npi_in_APS',
            'npi_in_all',
            'npi_out_011',
            'npi_out_017',
            'npi_out_APS',
            'npi_out_all',
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

        $mr_belum_iti_011 = $this->mr_belum_iti(['011C']);
        $mr_belum_iti_017 = $this->mr_belum_iti(['017C']);

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
            'mr_belum_iti_011',
            'mr_belum_iti_017',
        ));
    }

    public function po_sent_amount($date, $project)
    {
        $incl_deptcode = ['40', '50', '60', '140'];

        $excl_itemcode = ['EX%', 'FU%', 'PB%', 'Pp%', 'SA%', 'SO%', 'SV%']; // , 
        foreach ($excl_itemcode as $e) {
            $excl_itemcode_arr[] = ['item_code', 'not like', $e];
        };

        $list = DB::table('powithetas')
        // ->distinct('po_no')
            ->whereIn('dept_code', $incl_deptcode)
            ->where($excl_itemcode_arr)
            ->whereMonth('po_delivery_date', $date)
            ->whereIn('project_code', $project)
            ->where('po_status', '!=', 'Cancelled')
            ->where('po_delivery_status', '=', 'Delivered');

        return $list->sum('item_amount');
    }

    public function plant_budget($date, $project)
    {
        return Budget::whereIn('project_code', $project)
            ->where('budgettype_id', 2)
            ->whereMonth('date', $date)
            ->sum('amount');
    }

    public function grpo_amount($date, $project)
    {
        $incl_deptcode = ['40', '50', '60', '140'];
        $excl_itemcode = ['EX%', 'FU%', 'PB%', 'Pp%', 'SA%', 'SO%', 'SV%']; // , 
        foreach ($excl_itemcode as $e) {
            $excl_itemcode_arr[] = ['item_code', 'not like', $e];
        };

        $list = Grpo::whereMonth('po_delivery_date', $date)
            ->whereMonth('grpo_date', $date)
            ->where('po_delivery_status', 'Delivered')
            ->whereIn('project_code', $project)
            ->whereIn('dept_code', $incl_deptcode)
            ->where($excl_itemcode_arr);

        return $list->sum('item_amount');
        // return $list->get();
    }

    public function incoming_qty($date, $project)
    {
        $incl_deptcode = ['40', '50', '60', '140'];

        $excl_itemcode = ['CO%', 'EX%', 'FU%', 'PB%', 'Pp%', 'SA%', 'SO%', 'SV%']; // , 
        foreach ($excl_itemcode as $e) {
            $excl_itemcode_arr[] = ['item_code', 'not like', $e];
        };

        $excl_uom = ['%L%', '%M%', '%CM%'];
        foreach ($excl_uom as $e) {
            $excl_uom_arr[] = ['uom', 'not like', $e];
        }

        $list = DB::table('incomings');

        $in_qty = $list->whereMonth('posting_date', $date)
                    ->whereIn('project_code', $project)
                    ->whereIn('dept_code', $incl_deptcode)
                    ->where($excl_itemcode_arr)
                    ->sum('qty');

        return $in_qty;
    }

    public function outgoing_qty($date, $project)
    {
        $incl_deptcode = ['40', '50', '60', '140'];

        $excl_itemcode = ['CO%', 'EX%', 'FU%', 'PB%', 'Pp%', 'SA%', 'SO%', 'SV%']; // , 
        foreach ($excl_itemcode as $e) {
            $excl_itemcode_arr[] = ['item_code', 'not like', $e];
        };

        $excl_uom = ['%L%', '%M%', '%CM%'];
        foreach ($excl_uom as $e) {
            $excl_uom_arr[] = ['uom', 'not like', $e];
        }

        $list = DB::table('migis');

        $out_qty = $list->whereMonth('posting_date', $date)
                    ->whereIn('project_code', $project)
                    ->whereIn('dept_code', $incl_deptcode)
                    ->where($excl_itemcode_arr)
                    ->sum('qty');

        return $out_qty;
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
        $list = DB::table('progresmrs')
            ->select(DB::raw('mr_date'), DB::raw('count(*) as record_count'), DB::raw('datediff(now(), mr_date) as days'))
            ->whereIn('project_code', $project)
            ->where('mr_status', 'Open')
            ->groupBy('mr_date')
            ->get();

        return $list;
    }

    public function mr_belum_iti($project)    //MR yg sduah grpo namun belum ITI
    {
        $list = DB::table('progresmrs')
            ->select(DB::raw('grpo_date'), DB::raw('count(*) as record_count'), DB::raw('datediff(now(), grpo_date) as days'))
            ->whereIn('project_code', $project)
            ->whereNotNull('grpo_no')
            ->whereNull('mi_no')
            ->groupBy('grpo_date')
            ->get();

        return $list;
    }

    public function test()
    {
        $date = Carbon::now()->subMonth();
        $all_project = ['011C', '017C', 'APS'];

        $incl_deptcode = ['40', '50', '60', '140'];

        $excl_itemcode = ['EX%', 'FU%', 'PB%', 'Pp%', 'SA%', 'SO%', 'SV%']; // , 
        foreach ($excl_itemcode as $e) {
            $excl_itemcode_arr[] = ['item_code', 'not like', $e];
        };

        $list = DB::table('powithetas')
            // ->distinct('po_no')
            ->whereIn('dept_code', $incl_deptcode)
            ->where($excl_itemcode_arr)
            ->whereYear('po_delivery_date', $date)
            ->whereMonth('po_delivery_date', $date)
            ->whereIn('project_code', ['011C'])
            ->where('po_status', '!=', 'Cancelled')
            ->where('po_delivery_status', '=', 'Delivered');

        // $list = DB::table('powithetas')->where('po_no', '21022093');

        // return $list->get();
        // return $list->sum('item_amount');
        // return $list->sum('total_po_price');
        $amount = $this->grpo_amount($date, ['APS']);
        return $date;

        die;
    }

    
}
