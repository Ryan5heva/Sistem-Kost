<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Penghuni;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    public function index()
    {
        $pengaduan = Pengaduan::with('penghuni')->get();
        return view('pengaduan.index', compact('pengaduan'));
    }

    public function create()
    {
        $penghuni = Penghuni::where('status', 'aktif')->get();
        return view('pengaduan.create', compact('penghuni'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'penghuni_id' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        Pengaduan::create($request->all());
        return redirect()->route('pengaduan.index')->with('success', 'Pengaduan berhasil ditambahkan!');
    }

    public function edit(Pengaduan $pengaduan)
    {
        $penghuni = Penghuni::where('status', 'aktif')->get();
        return view('pengaduan.edit', compact('pengaduan', 'penghuni'));
    }

    public function update(Request $request, Pengaduan $pengaduan)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'status' => 'required',
        ]);

        $pengaduan->update($request->all());
        return redirect()->route('pengaduan.index')->with('success', 'Pengaduan berhasil diupdate!');
    }

    public function destroy(Pengaduan $pengaduan)
    {
        $pengaduan->delete();
        return redirect()->route('pengaduan.index')->with('success', 'Pengaduan berhasil dihapus!');
    }
}