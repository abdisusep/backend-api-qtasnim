<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\TransaksiBarang as TB;
use App\Models\TransaksiBarang;

class TransaksiBarangController extends Controller
{
    public function index($id)
    {
        $data = TB::collection(TransaksiBarang::where('id_transaksi', $id)->get());
        $response = [
            'success' => true,
            'message' => 'Data Transaksi Barang',
            'data' => $data
        ];
        return response()->json($response, 200);
    }

    public function store(Request $request)
    {
        $insert = TransaksiBarang::create([
            'id_transaksi' => $request->id_transaksi,
            'id_barang' => $request->id_barang,
            'harga' => $request->harga,
            'qty' => $request->qty,
        ]);

        if ($insert) {
            $response = [
                'success' => true,
                'message' => 'Insert Transaksi Barang',
                'data' => $insert
            ];
            return response()->json($response, 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = TransaksiBarang::find($id);
        $response = [
            'success' => true,
            'message' => 'Detail Transaksi Barang',
            'data' => $data
        ];
        return response()->json($response, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = TransaksiBarang::findOrFail($id)->delete();
        $response = [
            'success' => true,
            'message' => 'Delete Transaksi Barang',
        ];
        return response()->json($response, 200);
    }
}
