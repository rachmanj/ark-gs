<?php

namespace App\Http\Controllers;

use App\Imports\Incoming20Import;
use App\Incoming20;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Traits\FlashAlert;

class Incoming20Controller extends Controller
{
    use FlashAlert;

    public function index()
    {
        $latest_record = Incoming20::latest('created_at')->first();
        return view('incoming20s.index', compact('latest_record'));
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
        Excel::import(new Incoming20Import, public_path('/file_upload/' . $nama_file));

        // notifikasi dengan session
        // Session::flash('sukses', 'Data Berhasil Diimport!');

        // alihkan halaman kembali
        return redirect()->route('incoming20s.index')->with($this->alertImport());;
    }

    public function truncate()
    {
        Incoming20::truncate();

        return redirect()->route('incoming20s.index')->with($this->alertTruncated());
    }
}
