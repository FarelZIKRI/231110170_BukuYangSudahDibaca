@extends('layouts.app')

@section('title', $book->judul)

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-4 mb-4">
            <div class="card">
                <img src="{{ $book->image_url }}" class="card-img-top" alt="{{ $book->judul }}">
                <div class="card-body text-center">
                    <div class="mb-3">
                        {!! $book->rating_stars !!}
                        <span class="ms-2 text-muted">({{ $book->rating }}/5)</span>
                    </div>
                    <div class="btn-group w-100" role="group">
                        <a href="{{ route('books.edit', $book) }}" class="btn btn-warning">
                            <i class="fas fa-edit me-1"></i> Edit
                        </a>
                        <form action="{{ route('books.destroy', $book) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" 
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">
                                <i class="fas fa-trash me-1"></i> Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">
                        <i class="fas fa-book me-2"></i>
                        {{ $book->judul }}
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h5 class="text-muted">
                                <i class="fas fa-user me-2"></i>
                                Penulis
                            </h5>
                            <p class="fs-5">{{ $book->penulis }}</p>
                        </div>
                        <div class="col-md-6">
                            <h5 class="text-muted">
                                <i class="fas fa-calendar me-2"></i>
                                Tahun Terbit
                            </h5>
                            <p class="fs-5">{{ $book->tahun_terbit }}</p>
                        </div>
                    </div>
                    
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h5 class="text-muted">
                                <i class="fas fa-bookmark me-2"></i>
                                Status
                            </h5>
                            <div class="fs-5">
                                {!! $book->status_badge !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5 class="text-muted">
                                <i class="fas fa-star me-2"></i>
                                Rating
                            </h5>
                            <div class="fs-5">
                                {!! $book->rating_stars !!}
                                <span class="ms-2 text-muted">({{ $book->rating }}/5)</span>
                            </div>
                        </div>
                    </div>
                    
                    @if($book->sinopsis)
                        <div class="mb-4">
                            <h5 class="text-muted">
                                <i class="fas fa-align-left me-2"></i>
                                Sinopsis
                            </h5>
                            <p class="fs-6">{{ $book->sinopsis }}</p>
                        </div>
                    @endif
                    
                    @if($book->catatan)
                        <div class="mb-4">
                            <h5 class="text-muted">
                                <i class="fas fa-sticky-note me-2"></i>
                                Catatan Pribadi
                            </h5>
                            <div class="bg-light p-3 rounded">
                                <p class="fs-6 mb-0">{{ $book->catatan }}</p>
                            </div>
                        </div>
                    @endif
                    
                    <div class="mt-4">
                        <a href="{{ route('books.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-1"></i>
                            Kembali ke Daftar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 