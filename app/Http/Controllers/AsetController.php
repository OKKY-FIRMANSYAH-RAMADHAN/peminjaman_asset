<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AsetImport;
use App\Models\Barang;
use App\Models\Kategori;

class AsetController extends Controller
{
    public function index()
    {
        $data = [
            'title'     => 'List Data Aset',
            'barang'    => Barang::with('kategori')->get(),
            'kategori'  => Kategori::all()
        ];

        return view('admin.aset.select', $data);
    }

    public function viewImport()
    {
        $data = [
            'title'     => 'Import Data Aset',
            'kategori' => Kategori::all()
        ];
        return view('admin.aset.import',$data);
    }

    public function import(Request $request) 
    {
        $request->validate([
            'file' => 'required|max:5000|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');
        $id_kategori = $request->id_kategori;

        $import = Excel::import(new AsetImport($id_kategori), $file);

        if ($import) {
            session()->flash('success', 'Berhasil Mengimport Data Aset');
            return redirect()->route('admin.data.aset');
        }
    }

    public function showByKategori($slug){
        $kategori = Kategori::where('slug', $slug)->firstOrFail();

        $data = [
            'title'     => 'List Data Aset '. $kategori->nama_kategori,
            'barang'    => Barang::with('kategori')->where('id_kategori', '=', $kategori->id_kategori)->get(),
            'kategori'  => Kategori::all()
        ];

        return view('admin.aset.select', $data);
    }
}
