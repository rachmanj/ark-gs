<?php

namespace App\Http\Controllers;

use App\Imports\IncomingImport;
use App\Exports\IncomingExport;
use App\Exports\IncomingthismonthExport;
use App\Incoming;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Traits\FlashAlert;

class IncomingController extends Controller
{
    use FlashAlert;

    public function index()
    {
        $latest_record = Incoming::latest('created_at')->first();
        return view('incomings.index', compact('latest_record'));
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
        Excel::import(new IncomingImport, public_path('/file_upload/' . $nama_file));

        // notifikasi dengan session
        // Session::flash('sukses', 'Data Berhasil Diimport!');

        // alihkan halaman kembali
        return redirect()->route('incomings.index')->with($this->alertImport());;
    }

    public function truncate()
    {
        Incoming::truncate();

        return redirect()->route('incomings.index')->with($this->alertTruncated());
    }

    public function export_excel()
    {
        return Excel::download(new IncomingExport(), 'incoming_inventory.xlsx');
    }

    public function export_this_month()
    {
        return Excel::download(new IncomingthismonthExport(), 'incoming_inventory_this_month.xlsx');
    }
}
