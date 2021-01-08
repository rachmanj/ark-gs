<?php

namespace App\Http\Controllers;

use App\Budget;
use App\Incoming;
use App\Incoming20;
use App\Migi;
use App\Migi20;
use App\Powitheta;
use App\Po20witheta;
use App\Progresmr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $report_date = Carbon::now()->subDays(1);
        $po_post_rangeDate = ['2020-12-15', $report_date];
        $this_month = Carbon::now();
        $last_month_delivery = Carbon::now()->subMonth();
        $last_month = ['2020-11-15', '2020-12-31'];
        $all_project = ['011C', '017C', 'APS'];
        $latest_record = Progresmr::latest('wo_created')->first();

        // return $last_month_delivery;
        // die;

        $po_amount_011_this_month = $this->po_sent_amount($po_post_rangeDate, $this_month, ['011C']);
        $po_amount_017_this_month = $this->po_sent_amount($po_post_rangeDate, $this_month, ['017C']);
        $po_amount_APS_this_month = $this->po_sent_amount($po_post_rangeDate, $this_month, ['APS']);
        $po_amount_all_this_month = $this->po_sent_amount($po_post_rangeDate, $this_month, $all_project);

        // $po_amount_011_last_month = $this->po_sent_amount($last_month, $last_month_delivery, ['011C']);
        // $po_amount_017_last_month = $this->po_sent_amount($last_month, $last_month_delivery, ['017C']);
        // $po_amount_APS_last_month = $this->po_sent_amount($last_month, $last_month_delivery, ['APS']);

        $plant_budget_011_this_month = $this->plant_budget($this_month, ['011C']);
        $plant_budget_017_this_month = $this->plant_budget($this_month, ['017C']);
        $plant_budget_APS_this_month = $this->plant_budget($this_month, ['APS']);
        $plant_budget_all_this_month = $this->plant_budget($this_month, $all_project);

        $grpo_011_amount = $this->grpo_amount($po_post_rangeDate, $this_month, ['011C']);
        $grpo_017_amount = $this->grpo_amount($po_post_rangeDate, $this_month, ['017C']);
        $grpo_APS_amount = $this->grpo_amount($po_post_rangeDate, $this_month, ['APS']);
        $grpo_all_amount = $this->grpo_amount($po_post_rangeDate, $this_month, $all_project);

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
            'report_date',
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

    public function last_month()
    {
        // $last_month = Carbon::now()->subMonths(1);
        $last_month_po_range = ['2020-11-15', '2020-12-31'];
        $last_month_carbon = Carbon::now()->subMonths(1);
        $all_project = ['011C', '017C', 'APS'];

        $po_amount_011_last_month = $this->po_sent_amount($last_month_po_range, $last_month_carbon, ['011C']);
        $po_amount_017_last_month = $this->po_sent_amount($last_month_po_range, $last_month_carbon, ['017C']);
        $po_amount_APS_last_month = $this->po_sent_amount($last_month_po_range, $last_month_carbon, ['APS']);
        $po_amount_all_last_month = $this->po_sent_amount($last_month_po_range, $last_month_carbon, $all_project);

        $plant_budget_011_last_month = $this->plant_budget($last_month_carbon, ['011C']);
        $plant_budget_017_last_month = $this->plant_budget($last_month_carbon, ['017C']);
        $plant_budget_APS_last_month = $this->plant_budget($last_month_carbon, ['APS']);
        $plant_budget_all_last_month = $this->plant_budget($last_month_carbon, $all_project);

        $grpo_011_amount = $this->grpo_amount($last_month_po_range, $last_month_carbon, ['011C']);
        $grpo_017_amount = $this->grpo_amount($last_month_po_range, $last_month_carbon, ['017C']);
        $grpo_APS_amount = $this->grpo_amount($last_month_po_range, $last_month_carbon, ['APS']);
        $grpo_all_amount = $this->grpo_amount($last_month_po_range, $last_month_carbon, $all_project);

        $npi_incoming_011 = $this->incoming_qty($last_month_carbon, ['011C']);
        $npi_incoming_017 = $this->incoming_qty($last_month_carbon, ['017C']);
        $npi_incoming_APS = $this->incoming_qty($last_month_carbon, ['APS']);
        $npi_incoming_all = $this->incoming_qty($last_month_carbon, $all_project);

        $npi_outgoing_011 = $this->outgoing_qty($last_month_carbon, ['011C']);
        $npi_outgoing_017 = $this->outgoing_qty($last_month_carbon, ['017C']);
        $npi_outgoing_APS = $this->outgoing_qty($last_month_carbon, ['APS']);
        $npi_outgoing_all = $this->outgoing_qty($last_month_carbon, $all_project);

        return view('dashboard.last_month', compact(
            'last_month_carbon',
            'po_amount_011_last_month',
            'po_amount_017_last_month',
            'po_amount_APS_last_month',
            'po_amount_all_last_month',
            'plant_budget_011_last_month',
            'plant_budget_017_last_month',
            'plant_budget_APS_last_month',
            'plant_budget_all_last_month',
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
        ));
    }

    public function yearly()
    {
        $this_year = Carbon::now();
        $last_year = Carbon::now()->subYear();
        $all_project = ['011C', '017C', 'APS'];

        $po_sent_011_this_year = $this->po_sent_yearly($this_year, ['011C'], 'ty');
        $po_sent_017_this_year = $this->po_sent_yearly($this_year, ['017C'], 'ty');
        $po_sent_APS_this_year = $this->po_sent_yearly($this_year, ['APS'], 'ty');
        $po_sent_all_this_year = $this->po_sent_yearly($this_year, $all_project, 'ty');

        $plant_budget_011_this_year = $this->plant_budget_yearly($this_year, ['011C']);
        $plant_budget_017_this_year = $this->plant_budget_yearly($this_year, ['017C']);
        $plant_budget_APS_this_year = $this->plant_budget_yearly($this_year, ['APS']);
        $plant_budget_all_this_year = $this->plant_budget_yearly($this_year, $all_project);

        $po_sent_011_last_year = $this->po_sent_yearly($last_year, ['011C'], 'ly');
        $po_sent_017_last_year = $this->po_sent_yearly($last_year, ['017C'], 'ly');
        $po_sent_APS_last_year = $this->po_sent_yearly($last_year, ['APS'], 'ly');
        $po_sent_all_last_year = $this->po_sent_yearly($last_year, $all_project, 'ly');

        $plant_budget_011_last_year = $this->plant_budget_yearly($last_year, ['011C']);
        $plant_budget_017_last_year = $this->plant_budget_yearly($last_year, ['017C']);
        $plant_budget_APS_last_year = $this->plant_budget_yearly($last_year, ['APS']);
        $plant_budget_all_last_year = $this->plant_budget_yearly($last_year, $all_project);

        $npi_incoming_011_this_year = $this->incoming_qty_yearly($this_year, ['011C'], 'ty');
        $npi_incoming_017_this_year = $this->incoming_qty_yearly($this_year, ['017C'], 'ty');
        $npi_incoming_APS_this_year = $this->incoming_qty_yearly($this_year, ['APS'], 'ty');
        $npi_incoming_all_this_year = $this->incoming_qty_yearly($this_year, $all_project, 'ty');

        $npi_outgoing_011_this_year = $this->outgoing_qty_yearly($this_year, ['011C'], 'ty');
        $npi_outgoing_017_this_year = $this->outgoing_qty_yearly($this_year, ['017C'], 'ty');
        $npi_outgoing_APS_this_year = $this->outgoing_qty_yearly($this_year, ['APS'], 'ty');
        $npi_outgoing_all_this_year = $this->outgoing_qty_yearly($this_year, $all_project, 'ty');

        $npi_incoming_011_last_year = $this->incoming_qty_yearly($last_year, ['011C'], 'ly');
        $npi_incoming_017_last_year = $this->incoming_qty_yearly($last_year, ['017C'], 'ly');
        $npi_incoming_APS_last_year = $this->incoming_qty_yearly($last_year, ['APS'], 'ly');
        $npi_incoming_all_last_year = $this->incoming_qty_yearly($last_year, $all_project, 'ly');

        $npi_outgoing_011_last_year = $this->outgoing_qty_yearly($last_year, ['011C'], 'ly');
        $npi_outgoing_017_last_year = $this->outgoing_qty_yearly($last_year, ['017C'], 'ly');
        $npi_outgoing_APS_last_year = $this->outgoing_qty_yearly($last_year, ['APS'], 'ly');
        $npi_outgoing_all_last_year = $this->outgoing_qty_yearly($last_year, $all_project, 'ly');

        return view('dashboard.yearly', compact(
            'this_year',
            'last_year',
            'po_sent_011_this_year',
            'po_sent_017_this_year',
            'po_sent_APS_this_year',
            'po_sent_all_this_year',
            'plant_budget_011_this_year',
            'plant_budget_017_this_year',
            'plant_budget_APS_this_year',
            'plant_budget_all_this_year',
            'po_sent_011_last_year',
            'po_sent_017_last_year',
            'po_sent_APS_last_year',
            'po_sent_all_last_year',
            'plant_budget_011_last_year',
            'plant_budget_017_last_year',
            'plant_budget_APS_last_year',
            'plant_budget_all_last_year',
            'npi_incoming_011_this_year',
            'npi_incoming_017_this_year',
            'npi_incoming_APS_this_year',
            'npi_incoming_all_this_year',
            'npi_outgoing_011_this_year',
            'npi_outgoing_017_this_year',
            'npi_outgoing_APS_this_year',
            'npi_outgoing_all_this_year',
            'npi_incoming_011_last_year',
            'npi_incoming_017_last_year',
            'npi_incoming_APS_last_year',
            'npi_incoming_all_last_year',
            'npi_outgoing_011_last_year',
            'npi_outgoing_017_last_year',
            'npi_outgoing_APS_last_year',
            'npi_outgoing_all_last_year',
        ));
    }

    public function po_sent_yearly($year, $project, $t) // ty is this year
    {
        if ($t == 'ty') {
            $list = Powitheta::whereYear('po_delivery_date', $year);
        }
        $list = Po20witheta::whereYear('po_delivery_date', $year);
        $incl_deptcode = ['40', '50', '60', '140'];

        $excl_itemcode = ['%EX-FUEL%', '%OLA%', '%EX-%', '%SA-%'];
        foreach ($excl_itemcode as $e) {
            $excl_itemcode_arr[] = ['item_code', 'not like', $e];
        }

        return $list->whereIn('project_code', $project)
            ->whereIn('dept_code', $incl_deptcode) //
            ->where($excl_itemcode_arr)
            ->where('po_delivery_status', 'Delivered')
            ->where('po_status', '!=', 'Cancelled')
            ->sum('item_amount');
    }

    public function plant_budget_yearly($year, $project)
    {
        return Budget::whereIn('project_code', $project)
            ->where('budgettype_id', 2)
            ->whereYear('date', $year)
            ->sum('amount');
    }

    public function incoming_qty_yearly($year, $project, $t) // ty is This Year
    {
        if ($t == 'ty') {
            $list = Incoming::whereYear('posting_date', $year);
        }
        $list = Incoming20::whereYear('posting_date', $year);
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

    public function outgoing_qty_yearly($year, $project, $t) // ty is This Year
    {
        if ($t == 'ty') {
            $list = Migi::whereYear('posting_date', $year);;
        }
        $list = Migi20::whereYear('posting_date', $year);;
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

    public function po_sent_amount($rangeDate, $month, $project)
    {
        $list = Powitheta::whereBetween('posting_date', $rangeDate)->whereMonth('po_delivery_date', $month);
        // $list = Powitheta::whereMonth('posting_date', '=', $month);
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
            // ->distinct('po_no')
            // ->sum('total_po_price');
            ->sum('item_amount');
    }

    public function plant_budget($month, $project)
    {
        return Budget::whereIn('project_code', $project)
            ->where('budgettype_id', 2)
            ->whereMonth('date', $month)
            ->sum('amount');
    }

    public function grpo_amount($po_rangeDate, $grpo_month, $project)
    {
        // $list = Powitheta::whereMonth('posting_date', $month)->whereMonth('grpo_date', $month);
        $list = Powitheta::whereBetween('posting_date', $po_rangeDate)
            ->whereMonth('grpo_date', $grpo_month);
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
            ->whereNotNull('grpo_no')
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
        // $list = DB::table('progresmrs')
        //     ->select(DB::raw('mr_creation'), DB::raw('count(*) as record_count'), DB::raw('datediff(now(), mr_creation) as days'))
        //     ->whereIn('project_code', ['011C'])
        //     ->whereNotNull('grpo_no')
        //     ->whereNull('iti_no')
        //     ->groupBy('mr_creation')
        //     ->get();

        // $list = DB::table('progresmrs')->selectRaw('*, datediff(iti_date, grpo_date) as days')
        //     ->whereIn('project_code', ['017C'])
        //     ->whereNotNull('iti_no')
        //     ->get();

        // return $list;
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
}
