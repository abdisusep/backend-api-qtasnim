<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Barang as BR;
use App\Models\Barang;

class BarangController extends Controller
{
    public function index()
    {   
        $cari = $_GET['cari'];
        $orderBy = $_GET['orderBy'];

        if (isset($cari)) {
            $data = BR::collection(Barang::where("nama_barang", "like", "%$cari%")->orderBy('nama_barang', $orderBy)->get());
        } else {
            $data = BR::collection(Barang::all());
        }
        
        
        $response = [
            'success' => true,
            'message' => 'Data Barang',
            'data' => $data
        ];
        return response()->json($response, 200);
    }

    public function store(Request $request)
    {
        $insert = Barang::create([
            'nama_barang' => $request->nama_barang,
            'stok' => $request->stok,
            'harga' => $request->harga,
            'id_jenis_barang' => $request->id_jenis_barang,
        ]);

        if ($insert) {
            $response = [
                'success' => true,
                'message' => 'Insert Barang',
                'data' => $insert
            ];
            return response()->json($response, 201);
        }
    }

    public function show($id)
    {
        $data = new BR(Barang::find($id));
        $response = [
            'success' => true,
            'message' => 'Detail Barang',
            'data' => $data
        ];
        return response()->json($response, 200);
    }

    public function update(Request $request, $id)
    {
        $update = Barang::findOrFail($id);
        $update->nama_barang = $request->nama_barang;
        $update->stok  = $request->stok;
        $update->harga = $request->harga;
        $update->id_jenis_barang = $request->id_jenis_barang;
        $update->save();

        $response = [
            'success' => true,
            'message' => 'Update Barang',
            'data' => $update
        ];
        return response()->json($response, 200);
    }

    public function destroy($id)
    {
        $delete = Barang::findOrFail($id)->delete();
        $response = [
            'success' => true,
            'message' => 'Delete Barang',
        ];
        return response()->json($response, 200);
    }
}
