<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku - Aplikasi Manajemen Buku</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        .hero-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 100px 0;
        }
        
        .feature-card {
            transition: transform 0.3s ease;
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .feature-card:hover {
            transform: translateY(-5px);
        }
        
        .feature-icon {
            font-size: 3rem;
            color: #667eea;
            margin-bottom: 1rem;
        }
        
        .cta-section {
            background-color: #f8f9fa;
            padding: 80px 0;
        }
        
        .footer {
            background-color: #343a40;
            color: white;
            padding: 40px 0;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-book-open me-2"></i>
                Daftar Buku
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Fitur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary ms-2" href="{{ route('books.index') }}">
                            <i class="fas fa-sign-in-alt me-1"></i>
                            Mulai Sekarang
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold mb-4">
                        Kelola Daftar Buku Anda
                    </h1>
                    <p class="lead mb-4">
                        Aplikasi web sederhana untuk mengelola daftar buku yang telah dibaca. 
                        Dengan fitur CRUD lengkap dan tampilan responsif ala Netflix.
                    </p>
                    <div class="d-flex gap-3">
                        <a href="{{ route('books.index') }}" class="btn btn-light btn-lg">
                            <i class="fas fa-book me-2"></i>
                            Lihat Daftar Buku
                        </a>
                        <a href="{{ route('books.create') }}" class="btn btn-outline-light btn-lg">
                            <i class="fas fa-plus me-2"></i>
                            Tambah Buku Baru
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <i class="fas fa-book-open" style="font-size: 15rem; opacity: 0.3;"></i>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-5">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-lg-8 mx-auto">
                    <h2 class="display-5 fw-bold mb-3">Fitur Unggulan</h2>
                    <p class="lead text-muted">
                        Nikmati berbagai fitur canggih untuk mengelola koleksi buku Anda
                    </p>
                </div>
            </div>
            
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card feature-card h-100 text-center p-4">
                        <div class="feature-icon">
                            <i class="fas fa-list"></i>
                        </div>
                        <h4>Daftar Lengkap</h4>
                        <p class="text-muted">
                            Lihat semua buku dalam daftar yang terorganisir dengan baik
                        </p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card feature-card h-100 text-center p-4">
                        <div class="feature-icon">
                            <i class="fas fa-search"></i>
                        </div>
                        <h4>Pencarian & Filter</h4>
                        <p class="text-muted">
                            Cari buku berdasarkan judul dan filter berdasarkan status
                        </p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card feature-card h-100 text-center p-4">
                        <div class="feature-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <h4>Responsif</h4>
                        <p class="text-muted">
                            Tampilan yang optimal di desktop, tablet, dan mobile
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="display-5 fw-bold mb-4">Mulai Kelola Buku Anda Sekarang</h2>
                    <p class="lead mb-4">
                        Bergabunglah dengan ribuan pembaca yang telah menggunakan aplikasi kami
                    </p>
                    <a href="{{ route('books.index') }}" class="btn btn-primary btn-lg">
                        <i class="fas fa-rocket me-2"></i>
                        Mulai Sekarang
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h2 class="display-6 fw-bold mb-4">Tentang Aplikasi</h2>
                    <p class="lead mb-4">
                        Aplikasi Daftar Buku adalah solusi sederhana untuk mengelola koleksi buku Anda. 
                        Dibuat dengan teknologi modern seperti Laravel, Bootstrap, dan MySQL.
                    </p>
                    <div class="row">
                        <div class="col-6">
                            <h5><i class="fas fa-check-circle text-success me-2"></i>CRUD Lengkap</h5>
                            <h5><i class="fas fa-check-circle text-success me-2"></i>Pencarian Cepat</h5>
                        </div>
                        <div class="col-6">
                            <h5><i class="fas fa-check-circle text-success me-2"></i>Filter Status</h5>
                            <h5><i class="fas fa-check-circle text-success me-2"></i>Responsif</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Teknologi yang Digunakan</h5>
                            <ul class="list-unstyled">
                                <li><i class="fab fa-laravel text-danger me-2"></i>Laravel Framework</li>
                                <li><i class="fab fa-bootstrap text-primary me-2"></i>Bootstrap 5</li>
                                <li><i class="fas fa-database text-info me-2"></i>MySQL Database</li>
                                <li><i class="fab fa-php text-secondary me-2"></i>PHP 8</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5><i class="fas fa-book-open me-2"></i>Daftar Buku</h5>
                    <p class="mb-0">
                        Aplikasi manajemen buku sederhana dan efektif untuk mengelola koleksi buku Anda.
                    </p>
                </div>
                <div class="col-md-6 text-md-end">
                    <h6>Dibuat Oleh:</h6>
                    <p class="mb-0">
                        <i class="fas fa-user me-2"></i>
                        MUHAMMAD FAREL ZIKRI || 231110170
                    </p>
                    <p class="mb-0">
                        <i class="fas fa-code me-2"></i>
                        Dibuat dengan Laravel & Bootstrap
                    </p>
                </div>
            </div>
            <hr class="my-4">
            <div class="row">
                <div class="col-12 text-center">
                    <p class="mb-0">&copy; 2024 Daftar Buku. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
