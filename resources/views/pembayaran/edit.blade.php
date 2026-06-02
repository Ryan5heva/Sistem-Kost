@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4><i class="fas fa-edit me-2"></i> Edit Pembayaran</h4>
    <a href="{{ route('pembayaran.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-1"></i> Kembali
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('pembayaran.update', $pembayaran) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Penghuni</label>
                <select name="penghuni_id" class="form-select" required>
                    @foreach($penghuni as $p)
                    <option value="{{ $p->id }}" {{ $pembayaran->penghuni_id == $p->id ? 'selected' : '' }}>
                        {{ $p->nama }} - Kamar {{ $p->kamar->nomor_kamar ?? '-' }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Bulan</label>
                <select name="bulan" class="form-select" required>
                    @foreach(['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'] as $i => $b)
                    <option value="{{ $i+1 }}" {{ $pembayaran->bulan == $i+1 ? 'selected' : '' }}>{{ $b }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Tahun</label>
                <input type="number" name="tahun" class="form-control" value="{{ $pembayaran->tahun }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Jumlah</label>
                <input type="number" name="jumlah" class="form-control" value="{{ $pembayaran->jumlah }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select" required>
                    <option value="belum_bayar" {{ $pembayaran->status == 'belum_bayar' ? 'selected' : '' }}>Belum Bayar</option>
                    <option value="sudah_bayar" {{ $pembayaran->status == 'sudah_bayar' ? 'selected' : '' }}>Sudah Bayar</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Tanggal Bayar</label>
                <input type="date" name="tanggal_bayar" class="form-control" value="{{ $pembayaran->tanggal_bayar }}">
            </div>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-1"></i> Update
            </button>
        </form>
    </div>
</div>
@endsection