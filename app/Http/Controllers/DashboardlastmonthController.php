<?php

namespace App\Http\Controllers;

use App\Budget;
use App\History;
use Carbon\Carbon;

class DashboardlastmonthController extends Controller
{
    public function index()
    {
        $last_month = Carbon::now()->subMonth();
        $year = $last_month->year;
        $month = $last_month->month;
        $all_project = ['011C', '017C', 'APS'];

        $histories = History::whereMonth('date', $last_month)->where('periode', 'monthly')->get();

        $po_amount_011_last_month = $histories->where('project_code', '011C')->where('gs_type', 'po_sent')->first()->amount;
        $po_amount_017_last_month = $histories->where('project_code', '017C')->where('gs_type', 'po_sent')->first()->amount;
        $po_amount_APS_last_month = $histories->where('project_code', 'APS')->where('gs_type', 'po_sent')->first()->amount;
        $po_amount_all_last_month = $histories->where('gs_type', 'po_sent')->sum('amount');

        $plant_budget_011_last_month = $this->plant_budget($last_month, ['011C']);
        $plant_budget_017_last_month = $this->plant_budget($last_month, ['017C']);
        $plant_budget_APS_last_month = $this->plant_budget($last_month, ['APS']);
        $plant_budget_all_last_month = $this->plant_budget($last_month, $all_project);

        $grpo_011_amount = $histories->where('project_code', '011C')->where('gs_type', 'grpo_amount')->first()->amount;
        $grpo_017_amount = $histories->where('project_code', '017C')->where('gs_type', 'grpo_amount')->first()->amount;
        $grpo_APS_amount = $histories->where('project_code', 'APS')->where('gs_type', 'grpo_amount')->first()->amount;
        $grpo_all_amount = $histories->where('gs_type', 'grpo_amount')->sum('amount');

        $npi_incoming_011 = $histories->where('project_code', '011C')->where('gs_type', 'incoming_qty')->first()->amount;
        $npi_incoming_017 = $histories->where('project_code', '017C')->where('gs_type', 'incoming_qty')->first()->amount;
        $npi_incoming_APS = $histories->where('project_code', 'APS')->where('gs_type', 'incoming_qty')->first()->amount;
        $npi_incoming_all = $histories->where('gs_type', 'incoming_qty')->sum('amount');

        $npi_outgoing_011 = $histories->where('project_code', '011C')->where('gs_type', 'outgoing_qty')->first()->amount;
        $npi_outgoing_017 = $histories->where('project_code', '017C')->where('gs_type', 'outgoing_qty')->first()->amount;
        $npi_outgoing_APS = $histories->where('project_code', 'APS')->where('gs_type', 'outgoing_qty')->first()->amount;
        $npi_outgoing_all = $histories->where('gs_type', 'outgoing_qty')->sum('amount');

        return view('dashboard.last_month', compact(
            'last_month',
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

    public function plant_budget($month, $project)
    {
        return Budget::whereIn('project_code', $project)
            ->where('budgettype_id', 2)
            ->whereMonth('date', $month)
            ->sum('amount');
    }
}
