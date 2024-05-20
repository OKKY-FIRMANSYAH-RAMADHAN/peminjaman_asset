<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lokasi;

class LokasiController extends Controller
{
    function store(Request $request) {
        $lokasi = new Lokasi();
        $lokasi->id_barang = $request->id_barang;
        $lokasi->lokasi = $request->lokasi;
        $save = $lokasi->save();
        
        if ($save) {
            session()->flash('success', 'Berhasil Mengubah Lokasi');
            return redirect()->route('admin.data.aset');
        }
    }
}
