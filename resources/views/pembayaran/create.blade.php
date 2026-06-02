@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4><i class="fas fa-plus me-2"></i> Tambah Pembayaran</h4>
    <a href="{{ route('pembayaran.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-1"></i> Kembali
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('pembayaran.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Penghuni</label>
                <select name="penghuni_id" class="form-select" required>
                    <option value="">-- Pilih Penghuni --</option>
                    @foreach($penghuni as $p)
                    <option value="{{ $p->id }}">{{ $p->nama }} - Kamar {{ $p->kamar->nomor_kamar ?? '-' }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Bulan</label>
                <select name="bulan" class="form-select" required>
                    <option value="">-- Pilih Bulan --</option>
                    @foreach(['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'] as $i => $b)
                    <option value="{{ $i+1 }}">{{ $b }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Tahun</label>
                <input type="number" name="tahun" class="form-control" value="{{ date('Y') }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Jumlah</label>
                <input type="number" name="jumlah" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select" required>
                    <option value="belum_bayar">Belum Bayar</option>
                    <option value="sudah_bayar">Sudah Bayar</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Tanggal Bayar</label>
                <input type="date" name="tanggal_bayar" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-1"></i> Simpan
            </button>
        </form>
    </div>
</div>
@endsection