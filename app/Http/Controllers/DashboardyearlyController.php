<?php

namespace App\Http\Controllers;

use App\Budget;
use App\Grpo;
use App\History;
use App\Incoming;
use App\Migi;
use App\Powitheta;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardyearlyController extends Controller
{
    public function index()
    {
        $now = Carbon::now();
        $years = DB::table('histories')->select('periode', 'date')
                ->where('periode', 'yearly')
                ->whereYear('date', '<', $now)
                ->distinct('date')
                ->get();

        return view('dashboard.yearly.index', compact('years'));
    }
    
    public function display(Request $request)
    {
        $this->validate($request, [
            'year' => ['required']
        ]);

        $now = Carbon::now();
        $years = DB::table('histories')->select('periode', 'date')
                ->where('periode', 'yearly')
                ->whereYear('date', '<', $now)
                ->distinct('date')
                ->get();

        $all_projects = ['011C', '017C', '021C', '022C', 'APS'];

        if ($request->year !== 'this_year') {
            
            $year_title = substr($request->year, 0, 4);
            $po_sent_011 = $this->history_amount(['011C'], $request->year, 'po_sent');
            $po_sent_017 = $this->history_amount(['017C'], $request->year, 'po_sent');
            $po_sent_021 = $this->history_amount(['021C'], $request->year, 'po_sent');
            $po_sent_022 = $this->history_amount(['022C'], $request->year, 'po_sent');
            $po_sent_APS = $this->history_amount(['APS'], $request->year, 'po_sent');
            $po_sent_all = $this->history_amount($all_projects, $request->year, 'po_sent');
            $grpo_amount_011 = $this->history_amount(['011C'], $request->year, 'grpo_amount');
            $grpo_amount_017 = $this->history_amount(['017C'], $request->year, 'grpo_amount');
            $grpo_amount_021 = $this->history_amount(['021C'], $request->year, 'grpo_amount');
            $grpo_amount_022 = $this->history_amount(['022C'], $request->year, 'grpo_amount');
            $grpo_amount_APS = $this->history_amount(['APS'], $request->year, 'grpo_amount');
            $grpo_amount_all = $this->history_amount($all_projects, $request->year, 'grpo_amount');
            $incoming_qty_011 = $this->history_amount(['011C'], $request->year, 'incoming_qty');
            $incoming_qty_017 = $this->history_amount(['017C'], $request->year, 'incoming_qty');
            $incoming_qty_021 = $this->history_amount(['021C'], $request->year, 'incoming_qty');
            $incoming_qty_022 = $this->history_amount(['022C'], $request->year, 'incoming_qty');
            $incoming_qty_APS = $this->history_amount(['APS'], $request->year, 'incoming_qty');
            $incoming_qty_all = $this->history_amount($all_projects, $request->year, 'incoming_qty');
            $outgoing_qty_011 = $this->history_amount(['011C'], $request->year, 'outgoing_qty');
            $outgoing_qty_017 = $this->history_amount(['017C'], $request->year, 'outgoing_qty');
            $outgoing_qty_021 = $this->history_amount(['021C'], $request->year, 'outgoing_qty');
            $outgoing_qty_022 = $this->history_amount(['022C'], $request->year, 'outgoing_qty');
            $outgoing_qty_APS = $this->history_amount(['APS'], $request->year, 'outgoing_qty');
            $outgoing_qty_all = $this->history_amount($all_projects, $request->year, 'outgoing_qty');
            $plant_budget_011 = $this->plant_budget_yearly($request->year, ['011C']);
            $plant_budget_017 = $this->plant_budget_yearly($request->year, ['017C']);
            $plant_budget_021 = $this->plant_budget_yearly($request->year, ['021C']);
            $plant_budget_022 = $po_sent_022;
            $plant_budget_APS = $this->plant_budget_yearly($request->year, ['APS']);
            $plant_budget_all = $this->plant_budget_yearly($request->year, $all_projects);
            // $plant_budgetnov21_011 = $this->budget_ytd_nov2021(['011C']);
            // $plant_budgetnov21_017 = $this->budget_ytd_nov2021(['017C']);
            // $plant_budgetnov21_021 = $this->budget_ytd_nov2021(['021C']);
            // $plant_budgetnov21_022 = $po_sent_022;
            // $plant_budgetnov21_APS = $this->budget_ytd_nov2021(['APS']);
            // $plant_budgetnov21_all = $this->budget_ytd_nov2021($all_projects);

        } else {
            $year_title = 'This Year';
            $po_sent_011 = $this->po_sent_this_year(['011C']);
            $po_sent_017 = $this->po_sent_this_year(['017C']);
            $po_sent_021 = $this->po_sent_this_year(['021C']);
            $po_sent_022 = $this->po_sent_this_year(['022C']);
            $po_sent_APS = $this->po_sent_this_year(['APS']);
            $po_sent_all = $this->po_sent_this_year($all_projects);
            $grpo_amount_011 = $this->grpo_amount(['011C']);
            $grpo_amount_017 = $this->grpo_amount(['017C']);
            $grpo_amount_021 = $this->grpo_amount(['021C']);
            $grpo_amount_022 = $this->grpo_amount(['022C']);
            $grpo_amount_APS = $this->grpo_amount(['APS']); 
            $grpo_amount_all = $this->grpo_amount($all_projects);
            $incoming_qty_011 = $this->incoming_qty_this_year(['011C']);
            $incoming_qty_017 = $this->incoming_qty_this_year(['017C']);
            $incoming_qty_021 = $this->incoming_qty_this_year(['021C']);
            $incoming_qty_022 = $this->incoming_qty_this_year(['022C']);
            $incoming_qty_APS = $this->incoming_qty_this_year(['APS']);
            $incoming_qty_all = $this->incoming_qty_this_year($all_projects);
            $outgoing_qty_011 = $this->outgoing_qty_this_year(['011C']);
            $outgoing_qty_017 = $this->outgoing_qty_this_year(['017C']);
            $outgoing_qty_021 = $this->outgoing_qty_this_year(['021C']);
            $outgoing_qty_022 = $this->outgoing_qty_this_year(['022C']);
            $outgoing_qty_APS = $this->outgoing_qty_this_year(['APS']);
            $outgoing_qty_all = $this->outgoing_qty_this_year($all_projects);
            $plant_budget_011 = $this->plant_budget_yearly($now, ['011C']);
            $plant_budget_017 = $this->plant_budget_yearly($now, ['017C']);
            $plant_budget_021 = $this->plant_budget_yearly($now, ['021C']);
            $plant_budget_022 = $po_sent_022;
            $plant_budget_APS = $this->plant_budget_yearly($now, ['APS']);
            $plant_budget_all = $this->plant_budget_yearly($now, $all_projects);
        }

        

        return view('dashboard.yearly.display', compact(
            'year_title',
            'years',
            'po_sent_011',
            'po_sent_017',
            'po_sent_021',
            'po_sent_022',
            'po_sent_APS', 
            'po_sent_all',
            'plant_budget_011',
            'plant_budget_017',
            'plant_budget_021',
            'plant_budget_022',
            'plant_budget_APS',
            'plant_budget_all',
            'grpo_amount_011',
            'grpo_amount_017',
            'grpo_amount_021',
            'grpo_amount_022',
            'grpo_amount_APS', 
            'grpo_amount_all',
            'incoming_qty_011', 
            'incoming_qty_017', 
            'incoming_qty_021', 
            'incoming_qty_022', 
            'incoming_qty_APS', 
            'incoming_qty_all',
            'outgoing_qty_011',
            'outgoing_qty_017',
            'outgoing_qty_021',
            'outgoing_qty_022',
            'outgoing_qty_APS', 
            'outgoing_qty_all',
            // 'plant_budgetnov21_011',
            // 'plant_budgetnov21_017',
            // 'plant_budgetnov21_021',
            // 'plant_budgetnov21_022',
            // 'plant_budgetnov21_APS',
            // 'plant_budgetnov21_all',
        ));
    }

    public function po_sent_this_year($project_code)
    {
        $incl_deptcode = ['40', '50', '60', '140'];

        $excl_itemcode = ['EX%', 'FU%', 'PB%', 'Pp%', 'SA%', 'SO%', 'SV%']; // , 
        foreach ($excl_itemcode as $e) {
            $excl_itemcode_arr[] = ['item_code', 'not like', $e];
        };

        $list = Powitheta::whereIn('project_code', $project_code)
            ->whereIn('dept_code', $incl_deptcode) //
            ->where($excl_itemcode_arr)
            ->where('po_delivery_status', 'Delivered')
            ->where('po_status', '!=', 'Cancelled')
            ->sum('item_amount');

        return $list;
    }

    public function plant_budget_yearly($year, $project)
    {
        return Budget::whereIn('project_code', $project)
            ->where('budgettype_id', 2)
            ->whereYear('date', $year)
            ->sum('amount');
    }

    public function incoming_qty_this_year($project)
    {
        $incl_deptcode = ['40', '50', '60', '140'];

        $excl_itemcode = ['CO%', 'EX%', 'FU%', 'PB%', 'Pp%', 'SA%', 'SO%', 'SV%']; // , 
        foreach ($excl_itemcode as $e) {
            $excl_itemcode_arr[] = ['item_code', 'not like', $e];
        };

        return Incoming::whereIn('project_code', $project)
            ->whereIn('dept_code', $incl_deptcode)
            ->where($excl_itemcode_arr)
            ->sum('qty');
    }

    public function outgoing_qty_this_year($project) 
    {
        $incl_deptcode = ['40', '50', '60', '140'];

        $excl_itemcode = ['CO%', 'EX%', 'FU%', 'PB%', 'Pp%', 'SA%', 'SO%', 'SV%']; // , 
        foreach ($excl_itemcode as $e) {
            $excl_itemcode_arr[] = ['item_code', 'not like', $e];
        };

        return Migi::whereIn('project_code', $project)
                    ->whereIn('dept_code', $incl_deptcode)
                    ->where($excl_itemcode_arr)
                    ->sum('qty');
    }

    public function grpo_amount($project)
    {
        $incl_deptcode = ['40', '50', '60', '140'];
        $excl_itemcode = ['EX%', 'FU%', 'PB%', 'Pp%', 'SA%', 'SO%', 'SV%']; // , 
        foreach ($excl_itemcode as $e) {
            $excl_itemcode_arr[] = ['item_code', 'not like', $e];
        };

        $list = Grpo::where('po_delivery_status', 'Delivered')
            ->whereIn('project_code', $project)
            ->whereIn('dept_code', $incl_deptcode)
            ->where($excl_itemcode_arr);

        return $list->sum('item_amount');
    }

    public function history_amount($project, $year, $gs_type)
    {
        $list = History::where('periode', 'yearly')
                ->whereYear('date', $year)
                ->whereIn('project_code', $project)
                ->where('gs_type', $gs_type);
                

        return $list->sum('amount');
        
    }

    public function budget_ytd_nov2021($project)
    {
        // $budget = Budget::whereBetween('date', ['2020-12-31', '2021-12-01'])
        $budget = Budget::where('date', '>=', '2021-01-01')
                  ->where('date', '<=', '2021-11-30')
                  ->where('budgettype_id', 2)
                  ->whereIn('project_code', $project)
                  ->sum('amount');

        return $budget;
    }
}
