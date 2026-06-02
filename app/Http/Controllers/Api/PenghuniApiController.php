<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Penghuni;
use App\Models\Kamar;
use Illuminate\Http\Request;

class PenghuniApiController extends Controller
{
    public function index()
    {
        $penghuni = Penghuni::with('kamar')->get();
        return response()->json([
            'success' => true,
            'data' => $penghuni,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kamar_id' => 'required',
            'nama' => 'required',
            'nik' => 'required|unique:penghuni',
            'no_telepon' => 'required',
            'tanggal_masuk' => 'required|date',
        ]);

        $penghuni = Penghuni::create($request->all());
        Kamar::find($request->kamar_id)->update(['status' => 'terisi']);

        return response()->json([
            'success' => true,
            'message' => 'Penghuni berhasil ditambahkan',
            'data' => $penghuni,
        ], 201);
    }

    public function show(Penghuni $penghuni)
    {
        return response()->json([
            'success' => true,
            'data' => $penghuni->load('kamar'),
        ]);
    }

    public function update(Request $request, Penghuni $penghuni)
    {
        $request->validate([
            'nama' => 'required',
            'no_telepon' => 'required',
            'tanggal_masuk' => 'required|date',
        ]);

        $penghuni->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Penghuni berhasil diupdate',
            'data' => $penghuni,
        ]);
    }

    public function destroy(Penghuni $penghuni)
    {
        Kamar::find($penghuni->kamar_id)->update(['status' => 'tersedia']);
        $penghuni->delete();

        return response()->json([
            'success' => true,
            'message' => 'Penghuni berhasil dihapus',
        ]);
    }
}