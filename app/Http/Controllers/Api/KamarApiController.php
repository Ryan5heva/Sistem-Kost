<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kamar;
use Illuminate\Http\Request;

class KamarApiController extends Controller
{
    public function index()
    {
        $kamar = Kamar::all();
        return response()->json([
            'success' => true,
            'data' => $kamar,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_kamar' => 'required',
            'tipe' => 'required',
            'harga_per_bulan' => 'required|numeric',
            'status' => 'required',
        ]);

        $kamar = Kamar::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Kamar berhasil ditambahkan',
            'data' => $kamar,
        ], 201);
    }

    public function show(Kamar $kamar)
    {
        return response()->json([
            'success' => true,
            'data' => $kamar,
        ]);
    }

    public function update(Request $request, Kamar $kamar)
    {
        $request->validate([
            'nomor_kamar' => 'required',
            'tipe' => 'required',
            'harga_per_bulan' => 'required|numeric',
            'status' => 'required',
        ]);

        $kamar->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Kamar berhasil diupdate',
            'data' => $kamar,
        ]);
    }

    public function destroy(Kamar $kamar)
    {
        $kamar->delete();

        return response()->json([
            'success' => true,
            'message' => 'Kamar berhasil dihapus',
        ]);
    }
}