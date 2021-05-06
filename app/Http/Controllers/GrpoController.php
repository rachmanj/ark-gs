<?php

namespace App\Http\Controllers;

use App\Grpo;
use App\Imports\GrpoImport;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Traits\FlashAlert;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Exports\GrpothismonthExport;
use Illuminate\Support\Facades\DB;

class GrpoController extends Controller
{
    use FlashAlert;

    public function index()
    {
        return view('grpos.index');
    }

    public function this_month_index()
    {
        return view('grpos.this_month_index');
    }

    public function show($id)
    {
        try {
            $grpo = Grpo::findOrFail($id);

            return view('grpos.show', compact('grpo'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('grpos.index')->with($this->alertNotFound());
        }
    }

    public function import_excel(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');

        $nama_file = rand() . $file->getClientOriginalName();

        $file->move('file_upload', $nama_file);

        Excel::import(new GrpoImport, public_path('/file_upload/' . $nama_file));

        return redirect()->route('grpos.this_month_index')->with($this->alertImport());
    }

    public function truncate()
    {
        Grpo::truncate();

        return redirect()->route('grpos.index')->with($this->alertTruncated());
        
    }

    public function export_grpo_this_month()
    {
        return Excel::download(new GrpothismonthExport(), 'grpothismonth.xlsx');
    }
}
