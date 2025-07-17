<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'penulis',
        'tahun_terbit',
        'rating',
        'status',
        'sinopsis',
        'catatan',
        'image'
    ];

    protected $casts = [
        'tahun_terbit' => 'integer',
        'rating' => 'integer',
    ];

    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('images/' . $this->image);
        }
        return asset('images/default-book.jpg');
    }

    public function getRatingStarsAttribute()
    {
        $stars = '';
        for ($i = 1; $i <= 5; $i++) {
            if ($i <= $this->rating) {
                $stars .= '<i class="fas fa-star text-warning"></i>';
            } else {
                $stars .= '<i class="far fa-star text-warning"></i>';
            }
        }
        return $stars;
    }

    public function getStatusLabelAttribute()
    {
        $labels = [
            'belum_dibaca' => 'Belum Dibaca',
            'sedang_dibaca' => 'Sedang Dibaca',
            'sudah_dibaca' => 'Sudah Dibaca'
        ];
        return $labels[$this->status] ?? 'Belum Dibaca';
    }

    public function getStatusBadgeAttribute()
    {
        $badges = [
            'belum_dibaca' => '<span class="badge bg-secondary">Belum Dibaca</span>',
            'sedang_dibaca' => '<span class="badge bg-warning text-dark">Sedang Dibaca</span>',
            'sudah_dibaca' => '<span class="badge bg-success">Sudah Dibaca</span>'
        ];
        return $badges[$this->status] ?? '<span class="badge bg-secondary">Belum Dibaca</span>';
    }

    public function getStatusColorAttribute()
    {
        $colors = [
            'belum_dibaca' => 'secondary',
            'sedang_dibaca' => 'warning',
            'sudah_dibaca' => 'success'
        ];
        return $colors[$this->status] ?? 'secondary';
    }
} 