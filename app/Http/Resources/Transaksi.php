<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\TransaksiBarang as TB;
use App\Models\TransaksiBarang;

class Transaksi extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'total' => $this->total,
            'waktu' => $this->created_at,
            'barang' => TB::collection(TransaksiBarang::where('id_transaksi', $this->id)->get()),
        ];
    }
}
