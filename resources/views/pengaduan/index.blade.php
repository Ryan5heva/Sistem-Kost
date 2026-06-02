@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4><i class="fas fa-exclamation-circle me-2"></i> Data Pengaduan</h4>
    <a href="{{ route('pengaduan.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-1"></i> Tambah Pengaduan
    </a>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Penghuni</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pengaduan as $p)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $p->penghuni->nama ?? '-' }}</td>
                    <td>{{ $p->judul }}</td>
                    <td>{{ Str::limit($p->deskripsi, 50) }}</td>
                    <td>
                        @if($p->status == 'pending')
                            <span class="badge bg-danger">Pending</span>
                        @elseif($p->status == 'proses')
                            <span class="badge bg-warning">Proses</span>
                        @else
                            <span class="badge bg-success">Selesai</span>
                        @endif
                    </td>
                    <td>{{ $p->created_at->format('d/m/Y') }}</td>
                    <td>
                        <a href="{{ route('pengaduan.edit', $p) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('pengaduan.destroy', $p) }}" method="POST" class="d-inline">
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
                    <td colspan="7" class="text-center">Belum ada data pengaduan</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection