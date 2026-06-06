@extends('layouts.app')

@section('content')
<div class="page-header">
    <div>
        <h4><i class="fas fa-users me-2"></i> Data Penghuni</h4>
        <p>Kelola data penghuni kost</p>
    </div>
    @if(auth()->user()->role == 'admin')
    <a href="{{ route('penghuni.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-1"></i> Tambah Penghuni
    </a>
    @endif
</div>

<div class="card">
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIK</th>
                    <th>No. Telepon</th>
                    <th>Kamar</th>
                    <th>Tgl Masuk</th>
                    <th>Status</th>
                    @if(auth()->user()->role == 'admin')
                    <th>Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @forelse($penghuni as $p)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><strong>{{ $p->nama }}</strong></td>
                    <td>{{ $p->nik }}</td>
                    <td>{{ $p->no_telepon }}</td>
                    <td>{{ $p->kamar->nomor_kamar ?? '-' }}</td>
                    <td>{{ $p->tanggal_masuk }}</td>
                    <td>
                        @if($p->status == 'aktif')
                            <span class="badge bg-success">Aktif</span>
                        @else
                            <span class="badge bg-secondary">Keluar</span>
                        @endif
                    </td>
                    @if(auth()->user()->role == 'admin')
                    <td>
                        <a href="{{ route('penghuni.edit', $p) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('penghuni.destroy', $p) }}" method="POST" class="d-inline">
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
                    <td colspan="8" class="text-center py-4">Belum ada data penghuni</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection