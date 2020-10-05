<?php

namespace App\Http\Controllers;

use App\Budget;
use App\Incoming;
use App\Migi;
use App\Powitheta;
use App\Progresmr;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function powithetas()
    {
        $powithetas = Powitheta::all();

        return datatables()->of($powithetas)
            ->addIndexColumn()
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
}
