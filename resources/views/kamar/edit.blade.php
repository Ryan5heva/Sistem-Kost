@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4><i class="fas fa-edit me-2"></i> Edit Kamar</h4>
    <a href="{{ route('kamar.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-1"></i> Kembali
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('kamar.update', $kamar) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Nomor Kamar</label>
                <input type="text" name="nomor_kamar" class="form-control" value="{{ $kamar->nomor_kamar }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Tipe</label>
                <select name="tipe" class="form-select" required>
                    <option value="Standard" {{ $kamar->tipe == 'Standard' ? 'selected' : '' }}>Standard</option>
                    <option value="Deluxe" {{ $kamar->tipe == 'Deluxe' ? 'selected' : '' }}>Deluxe</option>
                    <option value="VIP" {{ $kamar->tipe == 'VIP' ? 'selected' : '' }}>VIP</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Harga per Bulan</label>
                <input type="number" name="harga_per_bulan" class="form-control" value="{{ $kamar->harga_per_bulan }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select" required>
                    <option value="tersedia" {{ $kamar->status == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                    <option value="terisi" {{ $kamar->status == 'terisi' ? 'selected' : '' }}>Terisi</option>
                    <option value="maintenance" {{ $kamar->status == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Fasilitas</label>
                <textarea name="fasilitas" class="form-control" rows="3">{{ $kamar->fasilitas }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-1"></i> Update
            </button>
        </form>
    </div>
</div>
@endsection