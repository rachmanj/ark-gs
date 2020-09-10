<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\PowithetaImport;
use Maatwebsite\Excel\Facades\Excel;

class PowithetaController extends Controller
{
    public function index()
    {
        return view('powithetas.index');
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
        return redirect()->route('powithetas.index');
    }
}
