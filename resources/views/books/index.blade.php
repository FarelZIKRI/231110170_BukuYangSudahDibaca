@extends('layouts.app')

@section('title', 'Daftar Buku yang Dibaca')

@section('content')
<div class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center text-white">
                <h1 class="display-4 fw-bold mb-3">
                    <i class="fas fa-book-open me-3"></i>
                    Daftar Buku yang Dibaca
                </h1>
                <p class="lead mb-4">Kelola koleksi buku favorit Anda dengan mudah dan nyaman</p>
                <a href="{{ route('books.create') }}" class="btn btn-light btn-lg">
                    <i class="fas fa-plus me-2"></i>
                    Tambah Buku Baru
                </a>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <!-- Search and Filter Section -->
    <div class="card mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('books.index') }}" class="row g-3">
                <!-- Search -->
                <div class="col-md-4">
                    <label for="search" class="form-label">
                        <i class="fas fa-search me-1"></i>
                        Cari Buku
                    </label>
                    <input type="text" class="form-control" id="search" name="search" 
                           value="{{ request('search') }}" placeholder="Judul, penulis, atau sinopsis...">
                </div>

                <!-- Status Filter -->
                <div class="col-md-3">
                    <label for="status" class="form-label">
                        <i class="fas fa-bookmark me-1"></i>
                        Status
                    </label>
                    <select class="form-select" id="status" name="status">
                        @foreach($statuses as $value => $label)
                            <option value="{{ $value }}" {{ request('status') == $value ? 'selected' : '' }}>
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Rating Filter -->
                <div class="col-md-3">
                    <label for="rating" class="form-label">
                        <i class="fas fa-star me-1"></i>
                        Rating
                    </label>
                    <select class="form-select" id="rating" name="rating">
                        @foreach($ratings as $value => $label)
                            <option value="{{ $value }}" {{ request('rating') == $value ? 'selected' : '' }}>
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Sort -->
                <div class="col-md-2">
                    <label for="sort" class="form-label">
                        <i class="fas fa-sort me-1"></i>
                        Urutkan
                    </label>
                    <select class="form-select" id="sort" name="sort">
                        <option value="created_at" {{ request('sort') == 'created_at' ? 'selected' : '' }}>Terbaru</option>
                        <option value="judul" {{ request('sort') == 'judul' ? 'selected' : '' }}>Judul A-Z</option>
                        <option value="rating" {{ request('sort') == 'rating' ? 'selected' : '' }}>Rating Tertinggi</option>
                        <option value="tahun_terbit" {{ request('sort') == 'tahun_terbit' ? 'selected' : '' }}>Tahun Terbit</option>
                    </select>
                </div>

                <!-- Action Buttons -->
                <div class="col-md-12">
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search me-1"></i>
                            Cari & Filter
                        </button>
                        <a href="{{ route('books.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times me-1"></i>
                            Reset
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Results Summary -->
    @if(request('search') || (request('status') && request('status') !== 'semua') || (request('rating') && request('rating') !== 'semua'))
        <div class="alert alert-info">
            <i class="fas fa-info-circle me-2"></i>
            Menampilkan {{ $books->count() }} buku
            @if(request('search'))
                untuk pencarian "{{ request('search') }}"
            @endif
            @if(request('status') && request('status') !== 'semua')
                dengan status "{{ $statuses[request('status')] }}"
            @endif
            @if(request('rating') && request('rating') !== 'semua')
                dengan rating "{{ $ratings[request('rating')] }}"
            @endif
        </div>
    @endif

    @if($books->count() > 0)
        <div class="row">
            @foreach($books as $book)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card h-100">
                        <img src="{{ $book->image_url }}" class="card-img-top" alt="{{ $book->judul }}">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold">{{ $book->judul }}</h5>
                            <p class="card-text text-muted">
                                <i class="fas fa-user me-1"></i>
                                {{ $book->penulis }}
                            </p>
                            <p class="card-text text-muted">
                                <i class="fas fa-calendar me-1"></i>
                                {{ $book->tahun_terbit }}
                            </p>
                            
                            <!-- Status Badge -->
                            <div class="mb-2">
                                {!! $book->status_badge !!}
                            </div>
                            
                            <div class="mb-3">
                                {!! $book->rating_stars !!}
                                <span class="ms-2 text-muted">({{ $book->rating }}/5)</span>
                            </div>
                            
                            @if($book->sinopsis)
                                <p class="card-text small text-muted">
                                    {{ Str::limit($book->sinopsis, 100) }}
                                </p>
                            @endif
                            
                            <div class="mt-auto">
                                <div class="btn-group w-100" role="group">
                                    <a href="{{ route('books.show', $book) }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-eye me-1"></i> Detail
                                    </a>
                                    <a href="{{ route('books.edit', $book) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit me-1"></i> Edit
                                    </a>
                                    <form action="{{ route('books.destroy', $book) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" 
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">
                                            <i class="fas fa-trash me-1"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-5">
            <div class="mb-4">
                <i class="fas fa-search fa-5x text-muted"></i>
            </div>
            <h3 class="text-muted mb-3">
                @if(request('search') || (request('status') && request('status') !== 'semua') || (request('rating') && request('rating') !== 'semua'))
                    Tidak ada buku yang ditemukan
                @else
                    Belum ada buku yang ditambahkan
                @endif
            </h3>
            <p class="text-muted mb-4">
                @if(request('search') || (request('status') && request('status') !== 'semua') || (request('rating') && request('rating') !== 'semua'))
                    Coba ubah filter atau pencarian Anda
                @else
                    Mulai dengan menambahkan buku pertama Anda
                @endif
            </p>
            <a href="{{ route('books.create') }}" class="btn btn-primary btn-lg">
                <i class="fas fa-plus me-2"></i>
                Tambah Buku Pertama
            </a>
        </div>
    @endif
</div>
@endsection 