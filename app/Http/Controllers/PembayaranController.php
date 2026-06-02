<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Penghuni;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayaran = Pembayaran::with('penghuni')->get();
        return view('pembayaran.index', compact('pembayaran'));
    }

    public function create()
    {
        $penghuni = Penghuni::where('status', 'aktif')->get();
        return view('pembayaran.create', compact('penghuni'));
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

        Pembayaran::create($request->all());
        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil ditambahkan!');
    }

    public function edit(Pembayaran $pembayaran)
    {
        $penghuni = Penghuni::where('status', 'aktif')->get();
        return view('pembayaran.edit', compact('pembayaran', 'penghuni'));
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
        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil diupdate!');
    }

    public function destroy(Pembayaran $pembayaran)
    {
        $pembayaran->delete();
        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil dihapus!');
    }
}