<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\Po20withetaImport;
use App\Po20witheta;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Traits\FlashAlert;
use Maatwebsite\Excel\Facades\Excel;

class Po20withetaController extends Controller
{
    use FlashAlert;

    public function index()
    {
        try {
            $latest_record = Po20witheta::latest('created_at')->first();

            return view('po20withetas.index', compact('latest_record'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('home')->with($this->alertNotFound());
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
        Excel::import(new Po20withetaImport, public_path('/file_upload/' . $nama_file));

        // notifikasi dengan session
        // Session::flash('sukses', 'Data Berhasil Diimport!');

        // alihkan halaman kembali
        return redirect()->route('po20withetas.index')->with($this->alertImport());
    }

    public function truncate()
    {
        Po20witheta::truncate();

        return redirect()->route('po20withetas.index')->with($this->alertTruncated());
    }
}
