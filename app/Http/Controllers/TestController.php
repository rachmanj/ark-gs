<?php

namespace App\Http\Controllers;

use App\Incoming;
use App\Migi;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class TestController extends Controller
{
    public function index()
    {
        $in_011 = $this->incoming_qty(['011C']);
        $in_017 = $this->incoming_qty(['017C']);
        $in_aps = $this->incoming_qty(['APS']);
        
        $out_011 = $this->outgoing_qty(['011C']);
        $out_017 = $this->outgoing_qty(['017C']);
        $out_aps = $this->outgoing_qty(['APS']);

        return view('test.npi', compact(
            'in_011',
            'in_017',
            'in_aps',
            'out_011',
            'out_017',
            'out_aps'
        ));
    }

    // public function incoming_qty($project)
    // {
    //     $last_month = Carbon::now()->subMonth();

    //     $list = DB::table('incomings')->selectRaw('project_code, item_code, uom, qty');

    //     $incl_deptcode = ['40', '50', '60', '140'];

    //     $excl_itemcode = ['%EX-FUEL%', '%OLA%', '%EX-%', '%SA-%', '%SV-%', '%CONS%', '%PPh%', '%LO-%']; // , 
    //     foreach ($excl_itemcode as $e) {
    //         $excl_itemcode_arr[] = ['item_code', 'not like', $e];
    //     }

    //     $excl_uom = ['L', 'LITER', '%M%', '%CM%'];
    //     foreach ($excl_uom as $e) {
    //         $excl_uom_arr[] = ['uom', 'not like', $e];
    //     }

    //     $incoming_qty = $list->whereMonth('posting_date', $last_month)
    //                 ->whereIn('project_code', $project)
    //                 ->whereIn('dept_code', $incl_deptcode)
    //                 ->where($excl_itemcode_arr)
    //                 ->orWhere($excl_uom_arr)
    //                 ->sum('qty');
    //                 // ->get();

    //     // return number_format($list_011, 2);
    //     // return $list_011;
    //     return $incoming_qty;

    // }

    // public function outgoing_qty($project)
    // {
    //     $last_month = Carbon::now()->subMonth();

    //     $list = DB::table('migis')->selectRaw('project_code, item_code, uom, qty');

    //     $incl_deptcode = ['40', '50', '60', '140'];

    //     $excl_itemcode = ['%EX-FUEL%', '%OLA%', '%EX-%', '%SA-%', '%SV-%', '%CONS%', '%PPh%', '%LO-%']; // , 
    //     foreach ($excl_itemcode as $e) {
    //         $excl_itemcode_arr[] = ['item_code', 'not like', $e];
    //     }

    //     $excl_uom = ['L', 'LITER', '%M%', '%CM%'];
    //     foreach ($excl_uom as $e) {
    //         $excl_uom_arr[] = ['uom', 'not like', $e];
    //     }

    //     $outgoing_qty = $list->whereMonth('posting_date', $last_month)
    //                 ->whereIn('project_code', $project)
    //                 ->whereIn('dept_code', $incl_deptcode)
    //                 ->where($excl_itemcode_arr)
    //                 ->orWhere($excl_uom_arr)
    //                 ->sum('qty');
    //                 // ->get();

    //     // return number_format($list_011, 2);
    //     // return $list_011;
    //     return $outgoing_qty;

    // }

    public function outgoing_qty($project)
    {
        $date = Carbon::now();

        // $list = DB::table('incomings')->selectRaw('project_code, item_code, uom, qty');
        $list = DB::table('migis')->selectRaw('item_code');

        $incl_deptcode = ['40', '50', '60', '140'];

        $excl_itemcode = ['CO%', 'EX%', 'FU%', 'PB%', 'Pp%', 'SA%', 'SO%', 'SV%']; // , 
        foreach ($excl_itemcode as $e) {
            $excl_itemcode_arr[] = ['item_code', 'not like', $e];
        };

        $excl_uom = ['L', 'LITER', '%M%', '%CM%'];
        foreach ($excl_uom as $e) {
            $excl_uom_arr[] = ['uom', 'not like', $e];
        };

        $list_filtered = $list->whereYear('posting_date', $date->year)->whereMonth('posting_date', $date->subMonth()->month)
                    ->whereIn('project_code', $project)
                    ->whereIn('dept_code', $incl_deptcode)
                    ->where($excl_itemcode_arr)
                    // ->where($excl_uom_arr);
                    // ->distinct('item_code')
                    ->sum('qty');
                    // ->get();
                    // ->count();

        
        return  $list_filtered; //->get();
    }

    public function incoming_qty($project)
    {
        $date = Carbon::now();

        // $list = DB::table('incomings')->selectRaw('project_code, item_code, uom, qty');
        $list = DB::table('incomings')->selectRaw('item_code');

        $incl_deptcode = ['40', '50', '60', '140'];

        $excl_itemcode = ['CO%', 'EX%', 'FU%', 'PB%', 'Pp%', 'SA%', 'SO%', 'SV%']; // , 
        foreach ($excl_itemcode as $e) {
            $excl_itemcode_arr[] = ['item_code', 'not like', $e];
        };

        $excl_uom = ['L', 'LITER', '%M%', '%CM%'];
        foreach ($excl_uom as $e) {
            $excl_uom_arr[] = ['uom', 'not like', $e];
        };

        $list_filtered = $list->whereYear('posting_date', $date->year)->whereMonth('posting_date', $date->subMonth()->month)
                    ->whereIn('project_code', $project)
                    ->whereIn('dept_code', $incl_deptcode)
                    ->where($excl_itemcode_arr)
                    // ->where($excl_uom_arr);
                    // ->distinct('item_code')
                    ->sum('qty');
                    // ->get();
                    // ->count();

        
        return  $list_filtered; //->get();
    }

    public function test2()
    {
        $date = Carbon::now();

        // $list = DB::table('incomings')->selectRaw('project_code, item_code, uom, qty');
        $list = DB::table('incomings')->selectRaw('item_code, substring(item_code, 1, 2) as code');

        $incl_deptcode = ['40', '50', '60', '140'];

        // $excl_itemcode = ['%EX-FUEL%', 'FU-FUEL', '%SOLAR%', '%EX-%', '%SA-%', '%SV-%', '%CONS%', 'PBBKB', '%CO-%', '%PPh%', '%LO-%']; // , 
        $excl_itemcode = ['CO%', 'EX%', 'FU%', 'PB%', 'Pp%', 'SA%', 'SO%', 'SV%']; // , 
        foreach ($excl_itemcode as $e) {
            $excl_itemcode_arr[] = ['item_code', 'not like', $e];
        };

        $excl_uom = ['L', 'LITER', '%M%', '%CM%'];
        foreach ($excl_uom as $e) {
            $excl_uom_arr[] = ['uom', 'not like', $e];
        };

        $list_filtered = $list->whereYear('posting_date', $date->year)->whereMonth('posting_date', $date->subMonth()->month)
                    ->whereIn('project_code', ['011C'])
                    ->whereIn('dept_code', $incl_deptcode)
                    ->where($excl_itemcode_arr)
                    // ->where($excl_uom_arr);
                    // ->distinct('item_code')
                    ->orderBy('item_code', 'asc')
                    // ->sum('qty');
                    ->get();
                    // ->count();

        return view('test.item_code', compact('list_filtered'));
         //->get();
    }

    // public function test3()
    // {
    //     $list = DB::table('incomings')->selectRaw('item_code');
    //     $list_filtered = $list->where(substr())
        
    //     return substr($text, 0, 2);
    // }
    
    public function test_api()
    {
        $response = Http::get("http://localhost:8000/api/invoices/last_month_count");
        return $response['data'];
    }

}