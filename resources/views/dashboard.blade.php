@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4><i class="fas fa-tachometer-alt me-2"></i> Dashboard</h4>
    <span class="text-muted">Selamat datang, {{ auth()->user()->name }}!</span>
</div>

<div class="row">
    <div class="col-md-3 mb-3">
        <div class="card bg-primary text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6>Total Kamar</h6>
                        <h3>{{ \App\Models\Kamar::count() }}</h3>
                    </div>
                    <i class="fas fa-door-open fa-2x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card bg-success text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6>Total Penghuni</h6>
                        <h3>{{ \App\Models\Penghuni::where('status','aktif')->count() }}</h3>
                    </div>
                    <i class="fas fa-users fa-2x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card bg-warning text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6>Belum Bayar</h6>
                        <h3>{{ \App\Models\Pembayaran::where('status','belum_bayar')->count() }}</h3>
                    </div>
                    <i class="fas fa-money-bill fa-2x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card bg-danger text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6>Pengaduan</h6>
                        <h3>{{ \App\Models\Pengaduan::where('status','pending')->count() }}</h3>
                    </div>
                    <i class="fas fa-exclamation-circle fa-2x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Kamar Tersedia</div>
            <div class="card-body">
                <h3 class="text-success">{{ \App\Models\Kamar::where('status','tersedia')->count() }} Kamar</h3>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Pengaduan Pending</div>
            <div class="card-body">
                <h3 class="text-danger">{{ \App\Models\Pengaduan::where('status','pending')->count() }} Pengaduan</h3>
            </div>
        </div>
    </div>
</div>
@endsection