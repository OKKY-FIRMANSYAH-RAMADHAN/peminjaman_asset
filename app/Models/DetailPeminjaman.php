<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class DetailPeminjaman extends Model
{
    use HasFactory,HasUuids;
    protected $table = 'detail_peminjaman';
    protected $primaryKey = 'id_detailpeminjaman';
    protected $fillable = ['idpeminjaman, id_barang, lokasi_awal, lokasi_awal, deskripsi'];
}
