<?php

namespace App\Models;

use App\Models\Peminjaman;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Lokasi extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'lokasi';
    protected $primaryKey = 'id_lokasi';
    protected $fillable = ['id_barang, id_peminjaman, lokasi'];

    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class, 'id_peminjaman', 'id_peminjaman');
    }
}
