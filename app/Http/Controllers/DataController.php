<?php

namespace App\Http\Controllers;

use App\Budget;
use App\Grpo;
use App\Incoming;
use App\Incoming20;
use App\Migi;
use App\Migi20;
use App\Powitheta;
use App\Po20witheta;
use App\Progresmr;
use App\History;
use Carbon\Carbon;

class DataController extends Controller
{
    public function powithetas()
    {
        $powithetas = Powitheta::orderBy('posting_date', 'desc')->get();

        return datatables()->of($powithetas)
            ->editColumn('item_amount', function (Powitheta $model) {
                return number_format($model->item_amount, 0);
            })
            ->addIndexColumn()
            ->addColumn('action', 'powithetas.action')
            ->toJson();
    }

    public function powithetas_this_month()
    {
        $date = Carbon::now();

        $incl_deptcode = ['40', '50', '60', '140'];
        $excl_itemcode = ['EX%', 'FU%', 'PB%', 'Pp%', 'SA%', 'SO%', 'SV%']; // , 
        foreach ($excl_itemcode as $e) {
            $excl_itemcode_arr[] = ['item_code', 'not like', $e];
        };

        $list = Powitheta::whereYear('po_delivery_date', $date->year)->whereMonth('po_delivery_date', $date->month)->orderBy('po_delivery_date', 'desc');
        $powitheta_thismonth = $list->whereIn('project_code', ['011C', '017C', 'APS'])
            ->whereIn('dept_code', $incl_deptcode)
            ->where($excl_itemcode_arr)
            ->where('po_delivery_status', 'Delivered')
            ->where('po_status', '!=', 'Cancelled')
            ->get();

        return datatables()->of($powitheta_thismonth)
            ->editColumn('item_amount', function (Powitheta $model) {
                return number_format($model->item_amount, 0);
            })
            ->addIndexColumn()
            ->addColumn('action', 'powithetas.action')
            ->toJson();
    }

    public function grpos()
    {
        $grpos = Grpo::orderBy('grpo_date', 'desc')->get();

        return datatables()->of($grpos)
            ->editColumn('item_amount', function (Grpo $model) {
                return number_format($model->item_amount, 0);
            })
            ->addIndexColumn()
            ->addColumn('action', 'grpos.action')
            ->toJson();
    }

    public function grpos_this_month()
    {   
        $date = Carbon::now();
        $incl_deptcode = ['40', '50', '60', '140'];
        $excl_itemcode = ['EX%', 'FU%', 'PB%', 'Pp%', 'SA%', 'SO%', 'SV%']; // , 
        foreach ($excl_itemcode as $e) {
            $excl_itemcode_arr[] = ['item_code', 'not like', $e];
        };

        $grpos = Grpo::whereMonth('po_delivery_date', $date)
            ->whereMonth('grpo_date', $date)
            ->where('po_delivery_status', 'Delivered')
            ->whereIn('dept_code', $incl_deptcode)
            ->where($excl_itemcode_arr);

        return datatables()->of($grpos)
            ->editColumn('item_amount', function (Grpo $model) {
                return number_format($model->item_amount, 0);
            })
            ->addIndexColumn()
            ->addColumn('action', 'grpos.action')
            ->toJson();
    }

    public function grpo_this_month()
    {
        $date = Carbon::now();

        $incl_deptcode = ['40', '50', '60', '140'];
        $excl_itemcode = ['EX%', 'FU%', 'PB%', 'Pp%', 'SA%', 'SO%', 'SV%']; // , 
        foreach ($excl_itemcode as $e) {
            $excl_itemcode_arr[] = ['item_code', 'not like', $e];
        };

        $list = Powitheta::whereMonth('po_delivery_date', $date)
            ->whereMonth('grpo_date', $date)
            ->where('po_delivery_status', 'Delivered')
            ->where('po_status', '!=', 'Cancelled')
            ->whereIn('dept_code', $incl_deptcode)
            ->where($excl_itemcode_arr)
            ->get();

        return datatables()->of($list)
            ->editColumn('item_amount', function (Powitheta $model) {
                return number_format($model->item_amount, 0);
            })
            ->addIndexColumn()
            ->addColumn('action', 'powithetas.action')
            ->toJson(); 
    }

    public function migis()
    {
        $migis = Migi::all();

        return datatables()->of($migis)
            ->addIndexColumn()
            ->toJson();
    }

    public function incomings()
    {
        $incomings = Incoming::all();

        return datatables()->of($incomings)
            ->addIndexColumn()
            ->toJson();
    }

    public function progresmrs()
    {
        $progresmrs = Progresmr::all();

        return datatables()->of($progresmrs)
            ->addIndexColumn()
            ->toJson();
    }

    public function budgets()
    {
        $budgets = Budget::with('budgettype')->orderBy('date', 'desc')->orderBy('project_code', 'asc')->get();

        return datatables()->of($budgets)
            ->addColumn('budget_type', function (Budget $model) {
                return $model->budgettype->display_name;
            })
            ->editColumn('amount', function (Budget $model) {
                return number_format($model->amount, 2);
            })
            ->editColumn('date', function (Budget $model) {
                return date('F Y', strtotime($model->date));
            })
            ->addIndexColumn()
            ->addColumn('action', 'budget.action')
            ->rawColumns(['action'])
            ->toJson();
    }

    public function po20withetas()
    {
        $po20withetas = Po20witheta::all();

        return datatables()->of($po20withetas)
            ->addIndexColumn()
            ->toJson();
    }

    public function migi20s()
    {
        $migi20s = Migi20::all();

        return datatables()->of($migi20s)
            ->addIndexColumn()
            ->toJson();
    }

    public function incoming20s()
    {
        $incoming20s = Incoming20::all();

        return datatables()->of($incoming20s)
            ->addIndexColumn()
            ->toJson();
    }

    public function po_sent_amount($rangeDate, $month, $project)
    {
        $list = Powitheta::whereBetween('posting_date', $rangeDate)->whereMonth('po_delivery_date', $month)->orderBy('posting_date', 'desc');
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
            ->get();
    }

    public function histories()
    {
        $histories = History::orderBy('date', 'desc')->orderBy('project_code', 'asc')->get();

        return datatables()->of($histories)
            ->editColumn('amount', function (History $model) {
                return number_format($model->amount, 2);
            })
            ->editColumn('date', function (History $model) {
                return date('F Y', strtotime($model->date));
            })
            ->addIndexColumn()
            ->addColumn('action', 'history.action')
            ->rawColumns(['action'])
            ->toJson();
    }

    public function test()
    {
        $last_month = Carbon::now()->subMonth();
        $year = $last_month->year;
        $month = $last_month->month;
        $all_project = ['011C', '017C', 'APS'];

        $histories = History::whereMonth('date', $last_month)->where('periode', 'monthly')->get();

        $po_amount_011_last_month = $histories->where('project_code', '011C')->where('gs_type', 'po_sent')->first()->amount;
        $po_amount_017_last_month = $histories->where('project_code', '017C')->where('gs_type', 'po_sent')->first()->amount;
        $po_amount_APS_last_month = $histories->where('project_code', 'APS')->where('gs_type', 'po_sent')->first()->amount;
        // $po_amount_all_last_month = $histories->where('gs_type', 'po_sent')->get();  //->sum('amount');
        // $amount = $histories->get()->sum('amount');
        $amount = History::whereMonth('date', $last_month)->where('periode', 'monthly')->sum('amount');
        
        return $po_amount_011_last_month;
    }

}
