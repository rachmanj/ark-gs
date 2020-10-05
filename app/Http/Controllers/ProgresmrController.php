<?php

namespace App\Http\Controllers;

use App\Imports\ProgresmrImport;
use App\Progresmr;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Traits\FlashAlert;
use Maatwebsite\Excel\Facades\Excel;

class ProgresmrController extends Controller
{
    use FlashAlert;

    public function index()
    {
        $latest_record = Progresmr::latest('created_at')->first();
        return view('progresmrs.index', compact('latest_record'));
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
        Excel::import(new ProgresmrImport, public_path('/file_upload/' . $nama_file));

        // notifikasi dengan session
        // Session::flash('sukses', 'Data Berhasil Diimport!');

        // alihkan halaman kembali
        return redirect()->route('progresmrs.index')->with($this->alertImport());
    }

    public function truncate()
    {
        Progresmr::truncate();

        return redirect()->route('progresmrs.index')->with($this->alertTruncated());
    }
}
