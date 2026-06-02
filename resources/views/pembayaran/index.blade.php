@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4><i class="fas fa-money-bill me-2"></i> Data Pembayaran</h4>
    <a href="{{ route('pembayaran.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-1"></i> Tambah Pembayaran
    </a>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Penghuni</th>
                    <th>Bulan/Tahun</th>
                    <th>Jumlah</th>
                    <th>Status</th>
                    <th>Tanggal Bayar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pembayaran as $p)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $p->penghuni->nama ?? '-' }}</td>
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
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">Belum ada data pembayaran</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection