<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Blog CMS</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #F2F4F7;
            color: #1C2434;
        }
        .sidebar {
            width: 260px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #FFFFFF;
            border-right: 1px solid #E4E7EC;
            z-index: 1000;
        }
        .main-content {
            margin-left: 260px;
            padding: 30px;
            min-height: 100vh;
        }
        .nav-link-go {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            color: #4A5568;
            font-weight: 500;
            font-size: 14px;
            text-decoration: none;
            border-radius: 12px;
            margin: 4px 15px;
            transition: all 0.2s ease;
        }
        .nav-link-go:hover {
            background-color: #F8F9FA;
            color: #00AA13;
        }
        .nav-link-go.active {
            background-color: #E6F6E8;
            color: #00AA13;
            font-weight: 600;
        }
        .btn-gojek {
            background-color: #00AA13;
            color: #FFFFFF;
            border: none;
            font-weight: 600;
            border-radius: 12px;
            transition: background-color 0.2s;
        }
        .btn-gojek:hover {
            background-color: #008F10;
            color: #FFFFFF;
        }
        .card-gojek {
            background: #FFFFFF;
            border: none;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
        }
    </style>
</head>
<body>

    <!-- Sidebar Admin -->
    <div class="sidebar d-flex flex-column justify-content-between py-4">
        <div>
            <!-- Logo Brand -->
            <div class="px-4 mb-4">
                <h4 class="fw-bold text-dark d-flex align-items-center gap-2">
                    <span style="color: #00AA13;">Blog</span> <small class="text-muted" style="font-size: 12px;">cms</small>
                </h4>
            </div>

            <!-- Menu Navigasi -->
            <div class="nav flex-column">
                <a href="{{ route('dashboard') }}" class="nav-link-go {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    📊 Dashboard Statistik
                </a>
                <a href="{{ route('kategori.index') }}" class="nav-link-go {{ request()->routeIs('kategori.*') ? 'active' : '' }}">
                    📁 Kelola Kategori
                </a>
                <a href="{{ route('penulis.index') }}" class="nav-link-go {{ request()->routeIs('penulis.*') ? 'active' : '' }}">
                    👥 Kelola Penulis
                </a>
                <a href="{{ route('artikel.index') }}" class="nav-link-go {{ request()->routeIs('artikel.*') ? 'active' : '' }}">
                    📰 Kelola Artikel
                </a>
            </div>
        </div>

        <!-- Bagian Bawah Sidebar (User Info & Logout) -->
        <div class="border-top pt-3 mx-3">
            <div class="d-flex align-items-center gap-3 px-2 mb-3">
                <img src="{{ asset('storage/foto/' . Auth::user()->foto) }}" class="rounded-circle border" style="width: 40px; height: 40px; object-fit: cover;" onerror="this.src='https://placehold.co/40px';">
                <div>
                    <h6 class="mb-0 fw-bold small text-dark">{{ Auth::user()->nama_depan }}</h6>
                    <small class="text-muted" style="font-size: 11px;">Admin Terautentikasi</small>
                </div>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-sm btn-light w-100 border text-danger py-2" style="border-radius: 10px; font-weight: 600;">
                    🚪 Keluar Akun
                </button>
            </form>
        </div>
    </div>

    <!-- Konten Utama -->
    <div class="main-content">
        @yield('content')
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>