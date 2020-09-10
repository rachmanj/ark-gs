<?php

namespace App\Http\Controllers;

use App\Powitheta;
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
}
