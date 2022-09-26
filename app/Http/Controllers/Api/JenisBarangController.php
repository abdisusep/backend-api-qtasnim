<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\JenisBarang as JB;
use App\Models\JenisBarang;

class JenisBarangController extends Controller
{
    public function index()
    {
        $cari = $_GET['cari'];
        $orderBy = $_GET['orderBy'];

        if (isset($cari)) {
            $data = JB::collection(JenisBarang::where("nama_jenis_barang", "like", "%$cari%")->orderBy('nama_jenis_barang', $orderBy)->get());
        } else {
            $data = JB::collection(JenisBarang::all());
        }

        $response = [
            'success' => true,
            'message' => 'Data Jenis Barang',
            'data' => $data
        ];
        return response()->json($response, 200);
    }

    public function store(Request $request)
    {
        $insert = JenisBarang::create([
            'nama_jenis_barang' => $request->nama_jenis_barang,
        ]);

        if ($insert) {
            $response = [
                'success' => true,
                'message' => 'Insert Jenis Barang',
                'data' => $insert
            ];
            return response()->json($response, 201);
        }
    }

    public function show($id)
    {
        $data = new JB(JenisBarang::find($id));
        $response = [
            'success' => true,
            'message' => 'Detail Jenis Barang',
            'data' => $data
        ];
        return response()->json($response, 200);
    }

    public function update(Request $request, $id)
    {
        $update = JenisBarang::findOrFail($id);
        $update->nama_jenis_barang = $request->nama_jenis_barang;
        $update->save();

        $response = [
            'success' => true,
            'message' => 'Update Jenis Barang',
            'data' => $update
        ];
        return response()->json($response, 200);

    }

    public function destroy($id)
    {
        $delete = JenisBarang::findOrFail($id)->delete();
        $response = [
            'success' => true,
            'message' => 'Delete Jenis Barang',
        ];
        return response()->json($response, 200);

    }
}
