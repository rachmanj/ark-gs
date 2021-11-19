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
        $month = substr($date, 5, 2);
        $year = substr($date, 0, 4);
        $all_project = ['011C', '017C', '021C', '022C', 'APS'];

        $histories = History::where('periode', 'monthly')
                    ->whereMonth('date', $month)    
                    ->whereYear('date', $year)    
                    ->get();
        
        // return $histories;
        // die;

        $po_amount_011_monthly = $histories->where('project_code', '011C')->where('gs_type', 'po_sent')->first();
        if($po_amount_011_monthly) {
            $po_amount_011_monthly = $po_amount_011_monthly->amount;
        } else {
            null;
        }

        $po_amount_017_monthly = $histories->where('project_code', '017C')->where('gs_type', 'po_sent')->first();
        if($po_amount_017_monthly) {
            $po_amount_017_monthly = $po_amount_017_monthly->amount;
        } else {
            null;
        }
        
        // pake if else krn data 021 dan 022 baru mulai pertengahan tahun
        $po_amount_021_monthly = $histories->where('project_code', '021C')->where('gs_type', 'po_sent')->first();
        if($po_amount_021_monthly) {
            $po_amount_021_monthly = $po_amount_021_monthly->amount;
        } else {
            null;
        }

        $po_amount_022_monthly = $histories->where('project_code', '022C')->where('gs_type', 'po_sent')->first();
        if($po_amount_022_monthly) {
            $po_amount_022_monthly = $po_amount_022_monthly->amount;
        } else {
            null;
        }

        $po_amount_APS_monthly = $histories->where('project_code', 'APS')->where('gs_type', 'po_sent')->first();
        if($po_amount_APS_monthly) {
            $po_amount_APS_monthly = $po_amount_APS_monthly->amount;
        } else {
            null;
        }
        $po_amount_all_monthly = $histories->where('gs_type', 'po_sent')->sum('amount');

        $plant_budget_011_monthly = $this->plant_budget($month, $year, ['011C']);
        $plant_budget_017_monthly = $this->plant_budget($month, $year, ['017C']);
        $plant_budget_021_monthly = $this->plant_budget($month, $year, ['021C']);
        $plant_budget_022_monthly = $this->plant_budget($month, $year, ['022C']);
        $plant_budget_APS_monthly = $this->plant_budget($month, $year, ['APS']);
        $plant_budget_all_monthly = $this->plant_budget($month, $year, $all_project);

        $grpo_011_amount = $histories->where('project_code', '011C')->where('gs_type', 'grpo_amount')->first();
        if($grpo_011_amount) {
            $grpo_011_amount = $grpo_011_amount->amount;
        } else {
            null;
        }
        $grpo_017_amount = $histories->where('project_code', '017C')->where('gs_type', 'grpo_amount')->first();
        if($grpo_017_amount) {
            $grpo_017_amount = $grpo_017_amount->amount;
        } else {
            null;
        }
        
        $grpo_021_amount = $histories->where('project_code', '021C')->where('gs_type', 'grpo_amount')->first();
        if($grpo_021_amount) {
            $grpo_021_amount = $grpo_021_amount->amount;
        } else {
            null;
        }

        $grpo_022_amount = $histories->where('project_code', '022C')->where('gs_type', 'grpo_amount')->first();
        if($grpo_022_amount) {
            $grpo_022_amount = $grpo_022_amount->amount;
        } else {
            null;
        }
        
        $grpo_APS_amount = $histories->where('project_code', 'APS')->where('gs_type', 'grpo_amount')->first();
        if($grpo_APS_amount) {
            $grpo_APS_amount = $grpo_APS_amount->amount;
        } else {
            null;
        }
        $grpo_all_amount = $histories->where('gs_type', 'grpo_amount')->sum('amount');

        $npi_incoming_011 = $histories->where('project_code', '011C')->where('gs_type', 'incoming_qty')->first();
        if($npi_incoming_011) {
            $npi_incoming_011 = $npi_incoming_011->amount;
        } else {
            null;
        }

        $npi_incoming_017 = $histories->where('project_code', '017C')->where('gs_type', 'incoming_qty')->first();
        if($npi_incoming_017) {
            $npi_incoming_017 = $npi_incoming_017->amount;
        } else {
            null;
        }

        $npi_incoming_021 = $histories->where('project_code', '021C')->where('gs_type', 'incoming_qty')->first();
        if($npi_incoming_021) {
            $npi_incoming_021 = $npi_incoming_021->amount;
        } else {
            null;
        }

        $npi_incoming_022 = $histories->where('project_code', '022C')->where('gs_type', 'incoming_qty')->first();
        if($npi_incoming_022) {
            $npi_incoming_022 = $npi_incoming_022->amount;
        } else {
            null;
        }

        $npi_incoming_APS = $histories->where('project_code', 'APS')->where('gs_type', 'incoming_qty')->first();
        if($npi_incoming_APS) {
            $npi_incoming_APS = $npi_incoming_APS->amount;
        } else {
            null;
        }
        $npi_incoming_all = $histories->where('gs_type', 'incoming_qty')->sum('amount');

        $npi_outgoing_011 = $histories->where('project_code', '011C')->where('gs_type', 'outgoing_qty')->first();
        if($npi_outgoing_011) {
            $npi_outgoing_011 = $npi_outgoing_011->amount;
        } else {
            null;
        }

        $npi_outgoing_017 = $histories->where('project_code', '017C')->where('gs_type', 'outgoing_qty')->first();
        if($npi_outgoing_017) {
            $npi_outgoing_017 = $npi_outgoing_017->amount;
        } else {
            null;
        }

        $npi_outgoing_021 = $histories->where('project_code', '021C')->where('gs_type', 'outgoing_qty')->first();
        if($npi_outgoing_021) {
            $npi_outgoing_021 = $npi_outgoing_021->amount;
        } else {
            null;
        }
        $npi_outgoing_022 = $histories->where('project_code', '022C')->where('gs_type', 'outgoing_qty')->first();
        if($npi_outgoing_022) {
            $npi_outgoing_022 = $npi_outgoing_022->amount;
        } else {
            null;
        }
        $npi_outgoing_APS = $histories->where('project_code', 'APS')->where('gs_type', 'outgoing_qty')->first();
        if($npi_outgoing_APS) {
            $npi_outgoing_APS = $npi_outgoing_APS->amount;
        } else {
            null;
        }

        $npi_outgoing_all = $histories->where('gs_type', 'outgoing_qty')->sum('amount');

        return view('dashboard.monthly.display', compact(
            'date',
            'po_amount_011_monthly',
            'po_amount_017_monthly',
            'po_amount_021_monthly',
            'po_amount_022_monthly',
            'po_amount_APS_monthly',
            'po_amount_all_monthly',
            'plant_budget_011_monthly',
            'plant_budget_017_monthly',
            'plant_budget_021_monthly',
            'plant_budget_022_monthly',
            'plant_budget_APS_monthly',
            'plant_budget_all_monthly',
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
        ));
    }

    public function plant_budget($month, $year, $project)
    {
        return Budget::whereIn('project_code', $project)
            ->where('budgettype_id', 2)
            ->whereMonth('date', $month)
            ->whereYear('date', $year)
            ->sum('amount');
    }
}
