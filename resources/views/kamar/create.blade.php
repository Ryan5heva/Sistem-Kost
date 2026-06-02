@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4><i class="fas fa-plus me-2"></i> Tambah Kamar</h4>
    <a href="{{ route('kamar.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-1"></i> Kembali
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('kamar.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nomor Kamar</label>
                <input type="text" name="nomor_kamar" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Tipe</label>
                <select name="tipe" class="form-select" required>
                    <option value="">-- Pilih Tipe --</option>
                    <option value="Standard">Standard</option>
                    <option value="Deluxe">Deluxe</option>
                    <option value="VIP">VIP</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Harga per Bulan</label>
                <input type="number" name="harga_per_bulan" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select" required>
                    <option value="tersedia">Tersedia</option>
                    <option value="terisi">Terisi</option>
                    <option value="maintenance">Maintenance</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Fasilitas</label>
                <textarea name="fasilitas" class="form-control" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-1"></i> Simpan
            </button>
        </form>
    </div>
</div>
@endsection