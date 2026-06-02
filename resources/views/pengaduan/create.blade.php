@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4><i class="fas fa-plus me-2"></i> Tambah Pengaduan</h4>
    <a href="{{ route('pengaduan.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-1"></i> Kembali
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('pengaduan.store') }}" method="POST">
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
                <label class="form-label">Judul</label>
                <input type="text" name="judul" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-1"></i> Simpan
            </button>
        </form>
    </div>
</div>
@endsection