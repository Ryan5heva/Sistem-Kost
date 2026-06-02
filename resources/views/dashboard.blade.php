@extends('layouts.app')

@section('content')
<div class="page-header">
    <div>
        <h4>Dashboard</h4>
        <p>Selamat datang kembali, {{ auth()->user()->name }}! 👋</p>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="stat-card stat-emerald">
            <div class="stat-icon"><i class="fas fa-door-open"></i></div>
            <div class="stat-value">{{ \App\Models\Kamar::count() }}</div>
            <div class="stat-label">Total Kamar</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card stat-blue">
            <div class="stat-icon"><i class="fas fa-users"></i></div>
            <div class="stat-value">{{ \App\Models\Penghuni::where('status','aktif')->count() }}</div>
            <div class="stat-label">Total Penghuni Aktif</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card stat-amber">
            <div class="stat-icon"><i class="fas fa-wallet"></i></div>
            <div class="stat-value">{{ \App\Models\Pembayaran::where('status','belum_bayar')->count() }}</div>
            <div class="stat-label">Belum Bayar</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card stat-red">
            <div class="stat-icon"><i class="fas fa-bell"></i></div>
            <div class="stat-value">{{ \App\Models\Pengaduan::where('status','pending')->count() }}</div>
            <div class="stat-label">Pengaduan Pending</div>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-md-6">
        <div class="card h-100">
            <div class="card-header d-flex align-items-center gap-2">
                <i class="fas fa-door-open text-success"></i> Status Kamar
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Kamar Tersedia</span>
                    <span class="badge bg-success fs-6">{{ \App\Models\Kamar::where('status','tersedia')->count() }}</span>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Kamar Terisi</span>
                    <span class="badge bg-danger fs-6">{{ \App\Models\Kamar::where('status','terisi')->count() }}</span>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <span class="text-muted">Maintenance</span>
                    <span class="badge bg-warning fs-6">{{ \App\Models\Kamar::where('status','maintenance')->count() }}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card h-100">
            <div class="card-header d-flex align-items-center gap-2">
                <i class="fas fa-bell text-danger"></i> Pengaduan Terbaru
            </div>
            <div class="card-body">
                @forelse(\App\Models\Pengaduan::with('penghuni')->latest()->take(3)->get() as $p)
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <div class="fw-600 text-dark" style="font-size:0.875rem">{{ $p->judul }}</div>
                        <div class="text-muted" style="font-size:0.78rem">{{ $p->penghuni->nama ?? '-' }}</div>
                    </div>
                    <span class="badge {{ $p->status == 'pending' ? 'bg-danger' : ($p->status == 'proses' ? 'bg-warning' : 'bg-success') }}">
                        {{ ucfirst($p->status) }}
                    </span>
                </div>
                @empty
                <p class="text-muted text-center">Belum ada pengaduan</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection