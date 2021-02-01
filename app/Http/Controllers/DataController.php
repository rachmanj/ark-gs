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

class DataController extends Controller
{
    public function powithetas()
    {
        $powithetas = Powitheta::all();

        return datatables()->of($powithetas)
            ->addIndexColumn()
            ->addColumn('action', 'powithetas.action')
            ->toJson();
    }

    public function powithetas_this_month()
    {
        $report_date = Carbon::now()->subDays(1);
        $month = Carbon::now()->subMonth()->format('m'); //->month;
        $year = Carbon::now()->submonth()->format('Y');
        $start_date = $year . '-' . $month . '-' . '15';
        $po_post_rangeDate = [$start_date, $report_date];
        $this_month = Carbon::now();
        $all_project = ['011C', '017C', 'APS'];
        $powitheta_thismonth = $this->po_sent_amount($po_post_rangeDate, $this_month, $all_project);

        return datatables()->of($powitheta_thismonth)
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
        $list = Powitheta::whereBetween('posting_date', $rangeDate)->whereMonth('po_delivery_date', $month);
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
}
