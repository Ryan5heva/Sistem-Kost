@extends('layouts.app')

@section('content')
<div class="page-header">
    <div>
        <h4><i class="fas fa-wallet me-2"></i> Data Pembayaran</h4>
        <p>Kelola data pembayaran kost</p>
    </div>
    @if(auth()->user()->role == 'admin')
    <a href="{{ route('pembayaran.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-1"></i> Tambah Pembayaran
    </a>
    @endif
</div>

<div class="card">
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Penghuni</th>
                    <th>Bulan/Tahun</th>
                    <th>Jumlah</th>
                    <th>Status</th>
                    <th>Tanggal Bayar</th>
                    @if(auth()->user()->role == 'admin')
                    <th>Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @forelse($pembayaran as $p)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><strong>{{ $p->penghuni->nama ?? '-' }}</strong></td>
                    <td>{{ $p->bulan }}/{{ $p->tahun }}</td>
                    <td>Rp {{ number_format($p->jumlah, 0, ',', '.') }}</td>
                    <td>
                        @if($p->status == 'sudah_bayar')
                            <span class="badge bg-success">Sudah Bayar</span>
                        @else
                            <span class="badge bg-danger">Belum Bayar</span>
                        @endif
                    </td>
                    <td>{{ $p->tanggal_bayar ?? '-' }}</td>
                    @if(auth()->user()->role == 'admin')
                    <td>
                        <a href="{{ route('pembayaran.edit', $p) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('pembayaran.destroy', $p) }}" method="POST" class="d-inline">
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
                    <td colspan="7" class="text-center py-4">Belum ada data pembayaran</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection