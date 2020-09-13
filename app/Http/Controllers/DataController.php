<?php

namespace App\Http\Controllers;

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
}
