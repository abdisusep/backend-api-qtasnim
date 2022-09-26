<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Barang extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nama_barang' => $this->nama_barang,
            'stok' => $this->stok,
            'harga' => $this->harga,
            'id_jenis_barang' => $this->id_jenis_barang,
            'jenis_barang' => $this->jenis_barang->nama_jenis_barang,
        ];
    }
}
