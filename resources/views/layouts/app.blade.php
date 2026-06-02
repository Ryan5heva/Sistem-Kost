<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Manajemen Kost</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Plus Jakarta Sans', sans-serif; }

        body { background: #f4f7f6; }

        /* SIDEBAR */
        .sidebar {
            width: 260px;
            min-height: 100vh;
            background: linear-gradient(160deg, #064e3b 0%, #065f46 50%, #047857 100%);
            position: fixed;
            top: 0; left: 0;
            z-index: 1000;
            box-shadow: 4px 0 20px rgba(6,78,59,0.3);
            display: flex;
            flex-direction: column;
        }

        .sidebar-brand {
            padding: 28px 24px 20px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .brand-logo {
            width: 48px; height: 48px;
            background: linear-gradient(135deg, #10b981, #34d399);
            border-radius: 14px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.4rem;
            box-shadow: 0 4px 15px rgba(16,185,129,0.4);
            margin-bottom: 12px;
        }

        .brand-title {
            color: white;
            font-size: 1rem;
            font-weight: 700;
            margin: 0;
            letter-spacing: 0.3px;
        }

        .brand-subtitle {
            color: rgba(255,255,255,0.5);
            font-size: 0.72rem;
            margin: 2px 0 0;
        }

        .sidebar-menu {
            padding: 16px 12px;
            flex: 1;
        }

        .menu-label {
            color: rgba(255,255,255,0.35);
            font-size: 0.65rem;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            padding: 8px 12px 6px;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 14px;
            color: rgba(255,255,255,0.65);
            text-decoration: none;
            border-radius: 10px;
            margin-bottom: 3px;
            font-size: 0.875rem;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .sidebar-menu a:hover {
            background: rgba(255,255,255,0.1);
            color: white;
            transform: translateX(3px);
        }

        .sidebar-menu a.active {
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
            box-shadow: 0 4px 12px rgba(16,185,129,0.35);
        }

        .sidebar-menu a .menu-icon {
            width: 34px; height: 34px;
            border-radius: 8px;
            background: rgba(255,255,255,0.08);
            display: flex; align-items: center; justify-content: center;
            font-size: 0.85rem;
            flex-shrink: 0;
        }

        .sidebar-menu a.active .menu-icon {
            background: rgba(255,255,255,0.2);
        }

        .sidebar-footer {
            padding: 16px 12px;
            border-top: 1px solid rgba(255,255,255,0.08);
        }

        .logout-btn {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 14px;
            color: rgba(255,255,255,0.55);
            background: none;
            border: none;
            border-radius: 10px;
            width: 100%;
            font-size: 0.875rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
        }

        .logout-btn:hover {
            background: rgba(239,68,68,0.15);
            color: #fca5a5;
        }

        .logout-btn .menu-icon {
            width: 34px; height: 34px;
            border-radius: 8px;
            background: rgba(255,255,255,0.08);
            display: flex; align-items: center; justify-content: center;
            font-size: 0.85rem;
        }

        /* MAIN */
        .main-content {
            margin-left: 260px;
            min-height: 100vh;
            padding: 0;
        }

        /* TOPBAR */
        .topbar {
            background: white;
            padding: 16px 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid #e5e7eb;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 1px 8px rgba(0,0,0,0.06);
        }

        .topbar-title {
            font-size: 1.05rem;
            font-weight: 700;
            color: #064e3b;
            margin: 0;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .user-avatar {
            width: 36px; height: 36px;
            background: linear-gradient(135deg, #10b981, #059669);
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 0.85rem;
        }

        .user-info .name {
            font-size: 0.85rem;
            font-weight: 600;
            color: #064e3b;
            margin: 0;
        }

        .user-info .role {
            font-size: 0.72rem;
            color: #6b7280;
            margin: 0;
        }

        /* PAGE CONTENT */
        .page-content {
            padding: 28px 32px;
        }

        /* PAGE HEADER */
        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
        }

        .page-header h4 {
            font-size: 1.3rem;
            font-weight: 700;
            color: #064e3b;
            margin: 0;
        }

        .page-header p {
            font-size: 0.82rem;
            color: #6b7280;
            margin: 3px 0 0;
        }

        /* CARDS */
        .card {
            border: none;
            border-radius: 14px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.06);
            overflow: hidden;
        }

        .card-header {
            background: white;
            border-bottom: 1px solid #f3f4f6;
            padding: 18px 22px;
            font-weight: 600;
            color: #064e3b;
        }

        .card-body { padding: 22px; }

        /* STAT CARDS */
        .stat-card {
            border-radius: 14px;
            padding: 22px;
            color: white;
            position: relative;
            overflow: hidden;
            border: none;
            box-shadow: 0 4px 15px rgba(0,0,0,0.12);
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: -20px; right: -20px;
            width: 100px; height: 100px;
            border-radius: 50%;
            background: rgba(255,255,255,0.1);
        }

        .stat-card::after {
            content: '';
            position: absolute;
            bottom: -30px; right: 20px;
            width: 80px; height: 80px;
            border-radius: 50%;
            background: rgba(255,255,255,0.07);
        }

        .stat-card .stat-icon {
            width: 46px; height: 46px;
            background: rgba(255,255,255,0.2);
            border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.2rem;
            margin-bottom: 14px;
        }

        .stat-card .stat-value {
            font-size: 2rem;
            font-weight: 800;
            line-height: 1;
            margin-bottom: 4px;
        }

        .stat-card .stat-label {
            font-size: 0.8rem;
            opacity: 0.85;
            font-weight: 500;
        }

        .stat-emerald { background: linear-gradient(135deg, #059669, #10b981); }
        .stat-blue { background: linear-gradient(135deg, #2563eb, #3b82f6); }
        .stat-amber { background: linear-gradient(135deg, #d97706, #f59e0b); }
        .stat-red { background: linear-gradient(135deg, #dc2626, #ef4444); }

        /* TABLE */
        .table-wrapper { border-radius: 14px; overflow: hidden; }

        .table { margin: 0; }

        .table thead tr {
            background: linear-gradient(135deg, #064e3b, #065f46);
        }

        .table thead th {
            color: white;
            font-weight: 600;
            font-size: 0.8rem;
            letter-spacing: 0.5px;
            padding: 14px 16px;
            border: none;
            text-transform: uppercase;
        }

        .table tbody td {
            padding: 13px 16px;
            vertical-align: middle;
            border-color: #f3f4f6;
            font-size: 0.875rem;
            color: #374151;
        }

        .table tbody tr:hover { background: #f0fdf4; }

        /* BUTTONS */
        .btn-primary {
            background: linear-gradient(135deg, #059669, #10b981);
            border: none;
            border-radius: 10px;
            padding: 9px 20px;
            font-weight: 600;
            font-size: 0.875rem;
            box-shadow: 0 3px 10px rgba(16,185,129,0.3);
            transition: all 0.2s;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #047857, #059669);
            transform: translateY(-1px);
            box-shadow: 0 5px 15px rgba(16,185,129,0.4);
        }

        .btn-secondary {
            background: #f3f4f6;
            border: none;
            color: #374151;
            border-radius: 10px;
            padding: 9px 20px;
            font-weight: 600;
            font-size: 0.875rem;
        }

        .btn-warning {
            background: linear-gradient(135deg, #d97706, #f59e0b);
            border: none;
            border-radius: 8px;
            color: white;
        }

        .btn-danger {
            background: linear-gradient(135deg, #dc2626, #ef4444);
            border: none;
            border-radius: 8px;
        }

        /* FORMS */
        .form-control, .form-select {
            border: 1.5px solid #e5e7eb;
            border-radius: 10px;
            padding: 10px 14px;
            font-size: 0.875rem;
            transition: all 0.2s;
        }

        .form-control:focus, .form-select:focus {
            border-color: #10b981;
            box-shadow: 0 0 0 3px rgba(16,185,129,0.12);
        }

        .form-label {
            font-weight: 600;
            font-size: 0.82rem;
            color: #374151;
            margin-bottom: 6px;
        }

        /* BADGES */
        .badge {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        /* ALERT */
        .alert-success {
            background: #ecfdf5;
            border: 1px solid #6ee7b7;
            color: #064e3b;
            border-radius: 12px;
            padding: 14px 18px;
        }
    </style>
</head>
<body>
<div class="d-flex">
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-brand">
            <div class="brand-logo">🏠</div>
            <p class="brand-title">SiKost</p>
            <p class="brand-subtitle">Sistem Manajemen Kost</p>
        </div>

        <div class="sidebar-menu">
            <div class="menu-label">Main Menu</div>
            <a href="{{ route('dashboard') }}" class="{{ request()->is('dashboard') ? 'active' : '' }}">
                <span class="menu-icon"><i class="fas fa-chart-pie"></i></span>
                Dashboard
            </a>
            <a href="{{ route('kamar.index') }}" class="{{ request()->is('kamar*') ? 'active' : '' }}">
                <span class="menu-icon"><i class="fas fa-door-open"></i></span>
                Kamar
            </a>
            <a href="{{ route('penghuni.index') }}" class="{{ request()->is('penghuni*') ? 'active' : '' }}">
                <span class="menu-icon"><i class="fas fa-users"></i></span>
                Penghuni
            </a>

            <div class="menu-label mt-2">Keuangan</div>
            <a href="{{ route('pembayaran.index') }}" class="{{ request()->is('pembayaran*') ? 'active' : '' }}">
                <span class="menu-icon"><i class="fas fa-wallet"></i></span>
                Pembayaran
            </a>

            <div class="menu-label mt-2">Layanan</div>
            <a href="{{ route('pengaduan.index') }}" class="{{ request()->is('pengaduan*') ? 'active' : '' }}">
                <span class="menu-icon"><i class="fas fa-bell"></i></span>
                Pengaduan
            </a>
        </div>

        <div class="sidebar-footer">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout-btn">
                    <span class="menu-icon"><i class="fas fa-sign-out-alt"></i></span>
                    Logout
                </button>
            </form>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content w-100">
        <!-- Topbar -->
        <div class="topbar">
            <p class="topbar-title">🌿 SiKost — Sistem Manajemen Kost</p>
            <div class="topbar-right">
                <div class="user-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
                <div class="user-info">
                    <p class="name">{{ auth()->user()->name }}</p>
                    <p class="role">Administrator</p>
                </div>
            </div>
        </div>

        <!-- Page Content -->
        <div class="page-content">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-4">
                    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>