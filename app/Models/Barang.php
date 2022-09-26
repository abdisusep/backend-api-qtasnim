<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';
    protected $fillable = [
        'nama_barang',
        'stok',
        'harga',
        'id_jenis_barang',
    ];

    public function jenis_barang()
    {
        return $this->belongsTo(JenisBarang::class, 'id_jenis_barang', 'id');
    }
}
