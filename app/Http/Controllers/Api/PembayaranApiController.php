<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use App\Models\Penghuni;
use Illuminate\Http\Request;

class PembayaranApiController extends Controller
{
    public function index()
    {
        $pembayaran = Pembayaran::with('penghuni')->get();
        return response()->json([
            'success' => true,
            'data' => $pembayaran,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'penghuni_id' => 'required',
            'bulan' => 'required|integer|min:1|max:12',
            'tahun' => 'required|integer',
            'jumlah' => 'required|numeric',
            'status' => 'required',
        ]);

        $pembayaran = Pembayaran::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Pembayaran berhasil ditambahkan',
            'data' => $pembayaran,
        ], 201);
    }

    public function show(Pembayaran $pembayaran)
    {
        return response()->json([
            'success' => true,
            'data' => $pembayaran->load('penghuni'),
        ]);
    }

    public function update(Request $request, Pembayaran $pembayaran)
    {
        $request->validate([
            'bulan' => 'required|integer|min:1|max:12',
            'tahun' => 'required|integer',
            'jumlah' => 'required|numeric',
            'status' => 'required',
        ]);

        $pembayaran->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Pembayaran berhasil diupdate',
            'data' => $pembayaran,
        ]);
    }

    public function destroy(Pembayaran $pembayaran)
    {
        $pembayaran->delete();

        return response()->json([
            'success' => true,
            'message' => 'Pembayaran berhasil dihapus',
        ]);
    }
}