<?php

namespace App\Http\Controllers;

use App\Budget;
use App\Incoming;
use App\Incoming20;
use App\Migi;
use App\Migi20;
use App\Po20witheta;
use App\Powitheta;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardyearlyController extends Controller
{
    public function index()
    {
        $this_year = Carbon::now();
        $last_year = Carbon::now()->subYear();
        $all_project = ['011C', '017C', 'APS'];

        $po_sent_011_this_year = $this->po_sent_yearly($this_year->year, ['011C'], 'ty');
        $po_sent_017_this_year = $this->po_sent_yearly($this_year->year, ['017C'], 'ty');
        $po_sent_021_this_year = $this->po_sent_yearly($this_year->year, ['021C'], 'ty');
        $po_sent_022_this_year = $this->po_sent_yearly($this_year->year, ['022C'], 'ty');
        $po_sent_APS_this_year = $this->po_sent_yearly($this_year->year, ['APS'], 'ty');
        $po_sent_all_this_year = $this->po_sent_yearly($this_year->year, $all_project, 'ty');

        $plant_budget_011_this_year = $this->plant_budget_yearly($this_year->year, ['011C']);
        $plant_budget_017_this_year = $this->plant_budget_yearly($this_year->year, ['017C']);
        $plant_budget_021_this_year = $po_sent_021_this_year;
        $plant_budget_022_this_year = $po_sent_022_this_year;
        $plant_budget_APS_this_year = $this->plant_budget_yearly($this_year->year, ['APS']);
        $plant_budget_all_this_year = $this->plant_budget_yearly($this_year->year, $all_project);

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
        $npi_incoming_021_this_year = $this->incoming_qty_yearly($this_year, ['021C'], 'ty');
        $npi_incoming_022_this_year = $this->incoming_qty_yearly($this_year, ['022C'], 'ty');
        $npi_incoming_APS_this_year = $this->incoming_qty_yearly($this_year, ['APS'], 'ty');
        $npi_incoming_all_this_year = $this->incoming_qty_yearly($this_year, $all_project, 'ty');

        $npi_outgoing_011_this_year = $this->outgoing_qty_yearly($this_year, ['011C'], 'ty');
        $npi_outgoing_017_this_year = $this->outgoing_qty_yearly($this_year, ['017C'], 'ty');
        $npi_outgoing_021_this_year = $this->outgoing_qty_yearly($this_year, ['021C'], 'ty');
        $npi_outgoing_022_this_year = $this->outgoing_qty_yearly($this_year, ['022C'], 'ty');
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

        return view('dashboard.yearly.index', compact(
            'this_year',
            'last_year',
            'po_sent_011_this_year',
            'po_sent_017_this_year',
            'po_sent_021_this_year',
            'po_sent_022_this_year',
            'po_sent_APS_this_year',
            'po_sent_all_this_year',
            'plant_budget_011_this_year',
            'plant_budget_017_this_year',
            'plant_budget_021_this_year',
            'plant_budget_022_this_year',
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
            'npi_incoming_021_this_year',
            'npi_incoming_022_this_year',
            'npi_incoming_APS_this_year',
            'npi_incoming_all_this_year',
            'npi_outgoing_011_this_year',
            'npi_outgoing_017_this_year',
            'npi_outgoing_021_this_year',
            'npi_outgoing_022_this_year',
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
        } else {
            $list = Po20witheta::whereYear('po_delivery_date', $year);
        }
        $incl_deptcode = ['40', '50', '60', '140'];

        $excl_itemcode = ['EX%', 'FU%', 'PB%', 'Pp%', 'SA%', 'SO%', 'SV%']; // , 
        foreach ($excl_itemcode as $e) {
            $excl_itemcode_arr[] = ['item_code', 'not like', $e];
        };

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
        } else {
            $list = Incoming20::whereYear('posting_date', $year);
        }
        $incl_deptcode = ['40', '50', '60', '140'];

        $excl_itemcode = ['CO%', 'EX%', 'FU%', 'PB%', 'Pp%', 'SA%', 'SO%', 'SV%']; // , 
        foreach ($excl_itemcode as $e) {
            $excl_itemcode_arr[] = ['item_code', 'not like', $e];
        };

        return $list->whereIn('project_code', $project)
            ->whereIn('dept_code', $incl_deptcode)
            ->where($excl_itemcode_arr)
            ->sum('qty');
    }

    public function outgoing_qty_yearly($year, $project, $t) // ty is This Year
    {
        if ($t == 'ty') {
            $list = Migi::whereYear('posting_date', $year);;
        } else {
            $list = Migi20::whereYear('posting_date', $year);;
        }
        $incl_deptcode = ['40', '50', '60', '140'];

        $excl_itemcode = ['CO%', 'EX%', 'FU%', 'PB%', 'Pp%', 'SA%', 'SO%', 'SV%']; // , 
        foreach ($excl_itemcode as $e) {
            $excl_itemcode_arr[] = ['item_code', 'not like', $e];
        };

        return $list->whereIn('project_code', $project)
            ->whereIn('dept_code', $incl_deptcode)
            ->where($excl_itemcode_arr)
            ->sum('qty');
    }
}
