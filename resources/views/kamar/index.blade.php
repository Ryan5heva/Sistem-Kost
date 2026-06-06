@extends('layouts.app')

@section('content')
<div class="page-header">
    <div>
        <h4><i class="fas fa-door-open me-2"></i> Data Kamar</h4>
        <p>Kelola data kamar kost</p>
    </div>
    @if(auth()->user()->role == 'admin')
    <a href="{{ route('kamar.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-1"></i> Tambah Kamar
    </a>
    @endif
</div>

<div class="card">
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nomor Kamar</th>
                    <th>Tipe</th>
                    <th>Harga/Bulan</th>
                    <th>Status</th>
                    <th>Fasilitas</th>
                    @if(auth()->user()->role == 'admin')
                    <th>Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @forelse($kamar as $k)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><strong>{{ $k->nomor_kamar }}</strong></td>
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
                    @if(auth()->user()->role == 'admin')
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
                    @endif
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center py-4">Belum ada data kamar</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection