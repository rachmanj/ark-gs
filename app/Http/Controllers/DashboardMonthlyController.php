<?php

namespace App\Http\Controllers;

use App\Budget;
use App\History;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardMonthlyController extends Controller
{
    public function index()
    {
        return view('dashboard.monthly.index');
    }

    public function display(Request $request)
    {
        $date = $request->month;
        // $date = '2021-11-01';
        
        $all_projects = ['011C', '017C', '021C', '022C', 'APS'];
        
        $po_amount_011_monthly = $this->monthly_history_amount(['011C'], $date, 'po_sent');
        $po_amount_017_monthly = $this->monthly_history_amount(['017C'], $date, 'po_sent');
        $po_amount_021_monthly = $this->monthly_history_amount(['021C'], $date, 'po_sent');
        $po_amount_022_monthly = $this->monthly_history_amount(['022C'], $date, 'po_sent');
        $po_amount_APS_monthly = $this->monthly_history_amount(['APS'], $date, 'po_sent');
        $po_amount_all_monthly = $this->monthly_history_amount($all_projects, $date, 'po_sent');
        $plant_budget_011_monthly = $this->plant_budget($date, ['011C']);
        $plant_budget_017_monthly = $this->plant_budget($date, ['017C']);
        $plant_budget_021_monthly = $this->plant_budget($date, ['021C']);
        $plant_budget_022_monthly = $po_amount_022_monthly;
        $plant_budget_APS_monthly = $this->plant_budget($date, ['APS']);
        $plant_budget_all_monthly = $this->plant_budget($date, $all_projects);
        $grpo_011_amount = $this->monthly_history_amount(['011C'], $date, 'grpo_amount');
        $grpo_017_amount = $this->monthly_history_amount(['017C'], $date, 'grpo_amount');
        $grpo_021_amount = $this->monthly_history_amount(['021C'], $date, 'grpo_amount');
        $grpo_022_amount = $this->monthly_history_amount(['022C'], $date, 'grpo_amount');
        $grpo_APS_amount = $this->monthly_history_amount(['APS'], $date, 'grpo_amount');
        $grpo_all_amount = $this->monthly_history_amount($all_projects, $date, 'grpo_amount');   
        $npi_incoming_011 = $this->monthly_history_amount(['011C'], $date, 'incoming_qty');
        $npi_incoming_017 = $this->monthly_history_amount(['017C'], $date, 'incoming_qty');
        $npi_incoming_021 = $this->monthly_history_amount(['021'], $date, 'incoming_qty');
        $npi_incoming_022 = $this->monthly_history_amount(['022C'], $date, 'incoming_qty');
        $npi_incoming_APS = $this->monthly_history_amount(['APS'], $date, 'incoming_qty');
        $npi_incoming_all = $this->monthly_history_amount($all_projects, $date, 'incoming_qty');   
        $npi_outgoing_011 = $this->monthly_history_amount(['011C'], $date, 'outgoing_qty');
        $npi_outgoing_017 = $this->monthly_history_amount(['017C'], $date, 'outgoing_qty');
        $npi_outgoing_021 = $this->monthly_history_amount(['021C'], $date, 'outgoing_qty');
        $npi_outgoing_022 = $this->monthly_history_amount(['022C'], $date, 'outgoing_qty');
        $npi_outgoing_APS = $this->monthly_history_amount(['APS'], $date, 'outgoing_qty');
        $npi_outgoing_all = $this->monthly_history_amount($all_projects, $date, 'outgoing_qty');

        return view('dashboard.monthly.display', compact(
            'date',
            'po_amount_011_monthly',
            'po_amount_017_monthly',
            'po_amount_021_monthly',
            'po_amount_022_monthly',
            'po_amount_APS_monthly',
            'po_amount_all_monthly',
            'grpo_011_amount',
            'grpo_017_amount',
            'grpo_021_amount',
            'grpo_022_amount',
            'grpo_APS_amount',
            'grpo_all_amount',
            'npi_incoming_011',
            'npi_incoming_017',
            'npi_incoming_021',
            'npi_incoming_022',
            'npi_incoming_APS',
            'npi_incoming_all',
            'npi_outgoing_011',
            'npi_outgoing_017',
            'npi_outgoing_021',
            'npi_outgoing_022',
            'npi_outgoing_APS',
            'npi_outgoing_all',
            'plant_budget_011_monthly',
            'plant_budget_017_monthly',
            'plant_budget_021_monthly',
            'plant_budget_022_monthly',
            'plant_budget_APS_monthly',
            'plant_budget_all_monthly',
        ));
    }

    public function plant_budget($date, $project)
    {
        $year = substr($date, 0, 4);
        $month = substr($date, 5, 2);

        return Budget::whereIn('project_code', $project)
            ->where('budgettype_id', 2)
            ->whereYear('date', $year)
            ->whereMonth('date',$month)
            ->sum('amount');
    }

    public function monthly_history_amount($project, $date, $gs_type)
    {
        $month = substr($date, 5, 2);
        $year = substr($date, 0, 4);

        $list = History::where('periode', 'monthly')
                ->whereIn('project_code', $project)
                ->whereYear('date', $year)
                ->whereMonth('date', $month)
                ->where('gs_type', $gs_type);
                // ->get();
        
        if ($list) {
            return $list->sum('amount');
        } else {
            return null;
        }        
        return $list;
    }
}
