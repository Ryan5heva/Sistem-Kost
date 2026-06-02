@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4><i class="fas fa-door-open me-2"></i> Data Kamar</h4>
    <a href="{{ route('kamar.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-1"></i> Tambah Kamar
    </a>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nomor Kamar</th>
                    <th>Tipe</th>
                    <th>Harga/Bulan</th>
                    <th>Status</th>
                    <th>Fasilitas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($kamar as $k)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $k->nomor_kamar }}</td>
                    <td>{{ $k->tipe }}</td>
                    <td>Rp {{ number_format($k->harga_per_bulan, 0, ',', '.') }}</td>
                    <td>
                        @if($k->status == 'tersedia')
                            <span class="badge bg-success">Tersedia</span>
                        @elseif($k->status == 'terisi')
                            <span class="badge bg-danger">Terisi</span>
                        @else
                            <span class="badge bg-warning">Maintenance</span>
                        @endif
                    </td>
                    <td>{{ $k->fasilitas ?? '-' }}</td>
                    <td>
                        <a href="{{ route('kamar.edit', $k) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('kamar.destroy', $k) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">Belum ada data kamar</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection