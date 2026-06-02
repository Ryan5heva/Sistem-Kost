<?php

namespace App\Http\Controllers;

use App\Models\Penghuni;
use App\Models\Kamar;
use Illuminate\Http\Request;

class PenghuniController extends Controller
{
    public function index()
    {
        $penghuni = Penghuni::with('kamar')->get();
        return view('penghuni.index', compact('penghuni'));
    }

    public function create()
    {
        $kamar = Kamar::where('status', 'tersedia')->get();
        return view('penghuni.create', compact('kamar'));
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

        Penghuni::create($request->all());

        // Update status kamar jadi terisi
        Kamar::find($request->kamar_id)->update(['status' => 'terisi']);

        return redirect()->route('penghuni.index')->with('success', 'Penghuni berhasil ditambahkan!');
    }

    public function edit(Penghuni $penghuni)
    {
        $kamar = Kamar::all();
        return view('penghuni.edit', compact('penghuni', 'kamar'));
    }

    public function update(Request $request, Penghuni $penghuni)
    {
        $request->validate([
            'nama' => 'required',
            'no_telepon' => 'required',
            'tanggal_masuk' => 'required|date',
        ]);

        $penghuni->update($request->all());
        return redirect()->route('penghuni.index')->with('success', 'Penghuni berhasil diupdate!');
    }

    public function destroy(Penghuni $penghuni)
    {
        // Update status kamar jadi tersedia
        Kamar::find($penghuni->kamar_id)->update(['status' => 'tersedia']);
        $penghuni->delete();
        return redirect()->route('penghuni.index')->with('success', 'Penghuni berhasil dihapus!');
    }
}