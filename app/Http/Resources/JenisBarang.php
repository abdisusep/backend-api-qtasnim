<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class JenisBarang extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nama_jenis_barang' => $this->nama_jenis_barang,
        ];
    }
}
