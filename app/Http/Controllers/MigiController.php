<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\MigiImport;
use App\Exports\MigiExport;
use App\Exports\MigithismonthExport;
use App\Migi;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Traits\FlashAlert;

class MigiController extends Controller
{
    use FlashAlert;

    public function index()
    {
        $latest_record = Migi::latest('created_at')->first();
        return view('migis.index', compact('latest_record'));
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
        Excel::import(new MigiImport, public_path('/file_upload/' . $nama_file));

        // notifikasi dengan session
        // Session::flash('sukses', 'Data Berhasil Diimport!');

        // alihkan halaman kembali
        return redirect()->route('migis.index')->with($this->alertImport());;;
    }

    public function truncate()
    {
        Migi::truncate();

        return redirect()->route('migis.index')->with($this->alertTruncated());
    }

    public function export_excel()
    {
        return Excel::download(new MigiExport(), 'list_mi_gi.xlsx');
    }

    public function export_this_month()
    {
        return Excel::download(new MigithismonthExport(), 'list_migi_thismonth.xlsx');
    }
}
