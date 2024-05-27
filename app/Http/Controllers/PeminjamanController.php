<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\DetailPeminjaman;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Lokasi;
use App\Exports\PeminjamanExport;
use Maatwebsite\Excel\Facades\Excel;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title'     => 'Peminjaman Sedang Berlangsung',
            'peminjaman' => Peminjaman::where('status', '0')->get()
        ];
        return view('admin.peminjaman.select',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Store ke tabel Peminjaman
        $peminjaman = new Peminjaman();
        $peminjaman->peminjam = $request->peminjam;
        $peminjaman->tanggal_pinjam = $request->tanggal_pinjam;
        $peminjaman->tanggal_kembali = $request->tanggal_kembali;
        $peminjaman->deskripsi = $request->deskripsi;
        $peminjaman->save();
        
        $id = $peminjaman->id_peminjaman;

        // Store ke tabel Detail Peminjaman Dan Lokasi
        foreach ($request->id_barang as $key => $item_id) {
            $detailpeminjaman = new DetailPeminjaman();
            $detailpeminjaman->id_peminjaman    = $id;
            $detailpeminjaman->id_barang        = $request->id_barang[$key];
            $detailpeminjaman->lokasi_awal      = $request->lokasi_awal[$key];
            $detailpeminjaman->lokasi_akhir     = $request->lokasi_akhir[$key];
            $detailpeminjaman->deskripsi        = $request->deskripsi_barang[$key];
            $detailpeminjaman->save();

            $lokasi = new Lokasi();
            $lokasi->id_barang      = $request->id_barang[$key];
            $lokasi->id_peminjaman  = $id;
            $lokasi->lokasi         = $request->lokasi_akhir[$key];
            $lokasi->save();
        }

        session()->flash('success', 'Berhasil Menambah Data Peminjaman');
        return redirect()->route('admin.peminjaman');
    }

    public function create()
    {
        $data = [
            'title'     => 'Tambah Peminjaman',
            'barang'    => Barang::with('kategori')->get(),
        ];
        return view('admin.peminjaman.tambah',$data);
    }

    public function status($id)
    {
        $peminjaman = Peminjaman::find($id);
        $peminjaman->status = '1';
        $update = $peminjaman->save();

        $detailpeminjaman = DetailPeminjaman::where('id_peminjaman', $id)->get();
        foreach ($detailpeminjaman as $item) {
            $lokasi = new Lokasi();
            $lokasi->id_barang      = $item->id_barang;
            $lokasi->id_peminjaman  = $item->id_peminjaman;
            $lokasi->lokasi         = $item->lokasi_awal;
            $lokasi->status         = '1';
            $lokasi->save();
        }

        if ($update) {
            session()->flash('success', 'Berhasil Mengubah Status Peminjaman');
            return redirect()->route('admin.peminjaman');
        }
    }

    public function laporan()
    {
        $data = [
            'title'     => 'Laporan Riwayat Peminjaman',
            'peminjaman' => Peminjaman::orderBy('created_at', 'desc')->get()
        ];
        return view('admin.peminjaman.laporan',$data);
    }

    public function export(){
        return Excel::download(new PeminjamanExport(), 'peminjaman.xlsx');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $delete = Peminjaman::destroy($id);
        if ($delete) {
            session()->flash('success', 'Berhasil Menghapus Data Peminjaman');
            return redirect()->route('admin.peminjaman');
        }
    }
}
