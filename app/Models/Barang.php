<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use App\Models\Kategori;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Barang extends Model
{
    use HasUuids, HasFactory;
    protected $table = 'barang';
    protected $primaryKey = 'id_barang';

    protected $fillable = [
        'id_kategori', 'kode_satker', 'nama_satker', 
        'kode_barang', 'nama_barang', 'nup', 'kondisi', 'merek', 'tipe', 'tanggal_perolehan', 'tanggal_awal_pakai',
        'nilai_perolehan_pertama', 'nilai_mutasi', 'nilai_perolehan', 'nilai_penyusutan', 'nilai_buku', 'kuantitas', 'jumlah_foto', 'status_penggunaan', 'no_psp',
        'tanggal_psp', 'no_ticket_usul_psp', 'intra_ekstra', 'status_bpybds', 'status_henti_guna', 'status_kemitraan', 'status_barang_hilang', 'status_barang_dktp', 'status_usul_rusak_berat', 'status_usul_hapus', 'sisa_umur', 'status_sakti', 'kode_register_sakti'
    ];

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }

}
