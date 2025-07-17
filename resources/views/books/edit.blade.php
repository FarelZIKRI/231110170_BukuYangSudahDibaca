@extends('layouts.app')

@section('title', 'Edit Buku - ' . $book->judul)

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header bg-warning text-white">
                    <h4 class="mb-0">
                        <i class="fas fa-edit me-2"></i>
                        Edit Buku: {{ $book->judul }}
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('books.update', $book) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="judul" class="form-label">
                                    <i class="fas fa-book me-1"></i>
                                    Judul Buku <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control @error('judul') is-invalid @enderror" 
                                       id="judul" name="judul" value="{{ old('judul', $book->judul) }}" required>
                                @error('judul')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="penulis" class="form-label">
                                    <i class="fas fa-user me-1"></i>
                                    Penulis <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control @error('penulis') is-invalid @enderror" 
                                       id="penulis" name="penulis" value="{{ old('penulis', $book->penulis) }}" required>
                                @error('penulis')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="tahun_terbit" class="form-label">
                                    <i class="fas fa-calendar me-1"></i>
                                    Tahun Terbit <span class="text-danger">*</span>
                                </label>
                                <input type="number" class="form-control @error('tahun_terbit') is-invalid @enderror" 
                                       id="tahun_terbit" name="tahun_terbit" 
                                       value="{{ old('tahun_terbit', $book->tahun_terbit) }}" 
                                       min="1900" max="{{ date('Y') + 1 }}" required>
                                @error('tahun_terbit')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-4 mb-3">
                                <label for="rating" class="form-label">
                                    <i class="fas fa-star me-1"></i>
                                    Rating <span class="text-danger">*</span>
                                </label>
                                <select class="form-select @error('rating') is-invalid @enderror" 
                                        id="rating" name="rating" required>
                                    <option value="">Pilih Rating</option>
                                    <option value="1" {{ old('rating', $book->rating) == '1' ? 'selected' : '' }}>1 ⭐</option>
                                    <option value="2" {{ old('rating', $book->rating) == '2' ? 'selected' : '' }}>2 ⭐⭐</option>
                                    <option value="3" {{ old('rating', $book->rating) == '3' ? 'selected' : '' }}>3 ⭐⭐⭐</option>
                                    <option value="4" {{ old('rating', $book->rating) == '4' ? 'selected' : '' }}>4 ⭐⭐⭐⭐</option>
                                    <option value="5" {{ old('rating', $book->rating) == '5' ? 'selected' : '' }}>5 ⭐⭐⭐⭐⭐</option>
                                </select>
                                @error('rating')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-4 mb-3">
                                <label for="status" class="form-label">
                                    <i class="fas fa-bookmark me-1"></i>
                                    Status <span class="text-danger">*</span>
                                </label>
                                <select class="form-select @error('status') is-invalid @enderror" 
                                        id="status" name="status" required>
                                    <option value="">Pilih Status</option>
                                    <option value="belum_dibaca" {{ old('status', $book->status) == 'belum_dibaca' ? 'selected' : '' }}>
                                        Belum Dibaca
                                    </option>
                                    <option value="sedang_dibaca" {{ old('status', $book->status) == 'sedang_dibaca' ? 'selected' : '' }}>
                                        Sedang Dibaca
                                    </option>
                                    <option value="sudah_dibaca" {{ old('status', $book->status) == 'sudah_dibaca' ? 'selected' : '' }}>
                                        Sudah Dibaca
                                    </option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="sinopsis" class="form-label">
                                <i class="fas fa-align-left me-1"></i>
                                Sinopsis
                            </label>
                            <textarea class="form-control @error('sinopsis') is-invalid @enderror" 
                                      id="sinopsis" name="sinopsis" rows="4" 
                                      placeholder="Masukkan sinopsis buku...">{{ old('sinopsis', $book->sinopsis) }}</textarea>
                            @error('sinopsis')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="catatan" class="form-label">
                                <i class="fas fa-sticky-note me-1"></i>
                                Catatan Pribadi
                            </label>
                            <textarea class="form-control @error('catatan') is-invalid @enderror" 
                                      id="catatan" name="catatan" rows="3" 
                                      placeholder="Catatan pribadi tentang buku ini...">{{ old('catatan', $book->catatan) }}</textarea>
                            @error('catatan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label for="image" class="form-label">
                                <i class="fas fa-image me-1"></i>
                                Gambar Buku
                            </label>
                            @if($book->image)
                                <div class="mb-2">
                                    <img src="{{ $book->image_url }}" alt="Current Image" 
                                         class="img-thumbnail" style="max-height: 150px;">
                                    <p class="text-muted small">Gambar saat ini</p>
                                </div>
                            @endif
                            <input type="file" class="form-control @error('image') is-invalid @enderror" 
                                   id="image" name="image" accept="image/*">
                            <div class="form-text">Format: JPG, PNG, GIF. Maksimal 2MB. Kosongkan jika tidak ingin mengubah gambar.</div>
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('books.show', $book) }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-1"></i>
                                Kembali
                            </a>
                            <button type="submit" class="btn btn-warning">
                                <i class="fas fa-save me-1"></i>
                                Update Buku
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 