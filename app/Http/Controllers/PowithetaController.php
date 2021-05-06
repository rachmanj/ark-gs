<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\PowithetaImport;
use App\Exports\PowithetaExport;
use App\Exports\PowithetathismonthExport;
use App\Exports\GrpothismonthExport;
use App\Grpo;
use App\Powitheta;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Traits\FlashAlert;
use Maatwebsite\Excel\Facades\Excel;

class PowithetaController extends Controller
{
    use FlashAlert;

    public function index()
    {
        try {
            $latest_record = Powitheta::latest('created_at')->first();

            return view('powithetas.index', compact('latest_record'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('home')->with($this->alertNotFound());
        }
    }

    public function this_month_index()
    {
        return view('powithetas.this_month_index');
    }

    public function grpo_this_month()
    {
        return view('powithetas.grpo_this_month');
    }

    public function show($id)
    {
        try {
            $powitheta = Powitheta::findOrFail($id);
            $grpo = Grpo::where('po_no', $powitheta->po_no)->first();

            return view('powithetas.show', compact('powitheta', 'grpo'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('powithetas.index')->with($this->alertNotFound());
        }
    }

    public function import_excel(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        // menangkap file excel
        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = rand() . $file->getClientOriginalName();

        // upload ke folder file_siswa di dalam folder public
        $file->move('file_upload', $nama_file);

        // import data
        Excel::import(new PowithetaImport, public_path('/file_upload/' . $nama_file));

        // notifikasi dengan session
        // Session::flash('sukses', 'Data Berhasil Diimport!');

        // alihkan halaman kembali
        return redirect()->route('powithetas.this_month_index')->with($this->alertImport());
    }

    public function truncate()
    {
        Powitheta::truncate();

        return redirect()->route('powithetas.this_month_index')->with($this->alertTruncated());
    }

    public function grpo_truncate()
    {
        Grpo::truncate();

        return redirect()->route('powithetas.this_month_index')->with($this->alertTruncated());
    }

    public function export_excel()
    {
        return Excel::download(new PowithetaExport(), 'powitheta.xlsx');
    }

    public function export_excel_this_month()
    {
        return Excel::download(new PowithetathismonthExport(), 'powithetathismonth.xlsx');
    }

    public function export_grpo_this_month()
    {
        return Excel::download(new GrpothismonthExport(), 'grpothismonth.xlsx');
    }
}
