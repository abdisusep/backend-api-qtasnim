<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Transaksi as TR;
use App\Models\Transaksi;
use App\Models\TransaksiBarang;

class TransaksiController extends Controller
{
    public function index()
    {
        $orderByWaktu = isset($_GET['orderByWaktu']) ? $_GET['orderByWaktu'] : 'asc';

        $data = TR::collection(Transaksi::orderBy('created_at', $orderByWaktu)->get());
        $response = [
            'success' => true,
            'message' => 'Data Transaksi',
            'data' => $data
        ];
        return response()->json($response, 200);
    }

    public function store(Request $request)
    {
        $insert = Transaksi::create([
            'total' => 0,
        ]);

        if ($insert) {
            $response = [
                'success' => true,
                'message' => 'Insert Transaksi',
                'data' => $insert
            ];
            return response()->json($response, 201);
        }
    }

    public function update(Request $request, $id)
    {
        $update = Transaksi::findOrFail($id);
        $update->total = $request->total;
        $update->save();

        $response = [
            'success' => true,
            'message' => 'Update Transaksi',
            'data' => $update
        ];
        return response()->json($response, 200);
    }

    public function destroy($id)
    {
        TransaksiBarang::where('id_transaksi', $id)->delete();
        $delete = Transaksi::findOrFail($id)->delete();
        $response = [
            'success' => true,
            'message' => 'Delete Transaksi',
        ];
        return response()->json($response, 200);
    }
}
