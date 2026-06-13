<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Portal Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #F2F4F7;
            color: #1C2434;
        }
        .navbar-go {
            background-color: #FFFFFF;
            border-bottom: 1px solid #E4E7EC;
        }
        .btn-gojek {
            background-color: #00AA13;
            color: #FFFFFF;
            border: none;
            font-weight: 600;
            border-radius: 12px;
            padding: 8px 20px;
        }
        .btn-gojek:hover {
            background-color: #008F10;
            color: #FFFFFF;
        }
        .card-blog {
            background: #FFFFFF;
            border: none;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.02);
            transition: transform 0.2s;
        }
        .card-blog:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.06);
        }
        .text-gojek-green {
            color: #00AA13;
        }
    </style>
</head>
<body>

    <!-- Navbar Pengunjung -->
    <nav class="navbar navbar-expand-lg navbar-go py-3 sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold text-dark fs-4" href="{{ route('publik.index') }}">
                <span class="text-gojek-green">Blog</span>
            </a>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav align-items-center gap-3">
                    <li class="nav-item">
                        <a class="nav-link fw-medium text-dark" href="{{ route('publik.index') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-gojek btn-sm" href="{{ route('login') }}">Masuk Portal Admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="py-5">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white border-top py-4 mt-5 text-center text-muted small">
        <div class="container">
            &copy; 2026 <span class="fw-bold text-dark"><span class="text-gojek-green">Blog</span></span>. Seluruh Hak Cipta Dilindungi.
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>