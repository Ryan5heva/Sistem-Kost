<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use App\Models\Penghuni;
use Illuminate\Http\Request;

class PengaduanApiController extends Controller
{
    public function index()
    {
        $pengaduan = Pengaduan::with('penghuni')->get();
        return response()->json([
            'success' => true,
            'data' => $pengaduan,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'penghuni_id' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        $pengaduan = Pengaduan::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Pengaduan berhasil ditambahkan',
            'data' => $pengaduan,
        ], 201);
    }

    public function show(Pengaduan $pengaduan)
    {
        return response()->json([
            'success' => true,
            'data' => $pengaduan->load('penghuni'),
        ]);
    }

    public function update(Request $request, Pengaduan $pengaduan)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'status' => 'required',
        ]);

        $pengaduan->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Pengaduan berhasil diupdate',
            'data' => $pengaduan,
        ]);
    }

    public function destroy(Pengaduan $pengaduan)
    {
        $pengaduan->delete();

        return response()->json([
            'success' => true,
            'message' => 'Pengaduan berhasil dihapus',
        ]);
    }
}