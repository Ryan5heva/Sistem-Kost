@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4><i class="fas fa-plus me-2"></i> Tambah Penghuni</h4>
    <a href="{{ route('penghuni.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-1"></i> Kembali
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('penghuni.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Kamar</label>
                <select name="kamar_id" class="form-select" required>
                    <option value="">-- Pilih Kamar --</option>
                    @foreach($kamar as $k)
                    <option value="{{ $k->id }}">{{ $k->nomor_kamar }} - {{ $k->tipe }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">NIK</label>
                <input type="text" name="nik" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">No. Telepon</label>
                <input type="text" name="no_telepon" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Alamat Asal</label>
                <textarea name="alamat_asal" class="form-control" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Tanggal Masuk</label>
                <input type="date" name="tanggal_masuk" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-1"></i> Simpan
            </button>
        </form>
    </div>
</div>
@endsection