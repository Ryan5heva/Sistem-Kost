@extends('layouts.app')

@section('content')
<div class="page-header">
    <div>
        <h4><i class="fas fa-bell me-2"></i> Data Pengaduan</h4>
        <p>Kelola data pengaduan penghuni</p>
    </div>
    <a href="{{ route('pengaduan.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-1"></i> Tambah Pengaduan
    </a>
</div>

<div class="card">
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Penghuni</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    @if(auth()->user()->role == 'admin')
                    <th>Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @forelse($pengaduan as $p)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><strong>{{ $p->penghuni->nama ?? '-' }}</strong></td>
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
                    @if(auth()->user()->role == 'admin')
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
                    @endif
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center py-4">Belum ada data pengaduan</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection