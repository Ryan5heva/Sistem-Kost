<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Manajemen Kost</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        .sidebar {
            min-height: 100vh;
            background: #2d3748;
        }
        .sidebar a {
            color: #a0aec0;
            text-decoration: none;
            display: block;
            padding: 10px 20px;
        }
        .sidebar a:hover {
            background: #4a5568;
            color: white;
        }
        .sidebar .active {
            background: #4a5568;
            color: white;
        }
    </style>
</head>
<body>
<div class="d-flex">
    <!-- Sidebar -->
    <div class="sidebar col-md-2 p-0">
        <div class="p-3 text-white text-center border-bottom border-secondary">
            <h6 class="mb-0"><i class="fas fa-home"></i> Sistem Kost</h6>
        </div>
        <nav class="mt-2">
            <a href="{{ route('dashboard') }}" class="{{ request()->is('dashboard') ? 'active' : '' }}">
                <i class="fas fa-tachometer-alt me-2"></i> Dashboard
            </a>
            <a href="{{ route('kamar.index') }}" class="{{ request()->is('kamar*') ? 'active' : '' }}">
                <i class="fas fa-door-open me-2"></i> Kamar
            </a>
            <a href="{{ route('penghuni.index') }}" class="{{ request()->is('penghuni*') ? 'active' : '' }}">
                <i class="fas fa-users me-2"></i> Penghuni
            </a>
            <a href="{{ route('pembayaran.index') }}" class="{{ request()->is('pembayaran*') ? 'active' : '' }}">
                <i class="fas fa-money-bill me-2"></i> Pembayaran
            </a>
            <a href="{{ route('pengaduan.index') }}" class="{{ request()->is('pengaduan*') ? 'active' : '' }}">
                <i class="fas fa-exclamation-circle me-2"></i> Pengaduan
            </a>
            <hr class="border-secondary">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-link sidebar-link w-100 text-start" style="color:#a0aec0; padding: 10px 20px;">
                    <i class="fas fa-sign-out-alt me-2"></i> Logout
                </button>
            </form>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="col-md-10 p-4">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>