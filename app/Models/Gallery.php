<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Gallery extends Model
{
    use HasFactory;

    public $fillable = [
        'school_profile_id',
        'news_id',
        'title',
        'description',
        'image',
    ];

    protected function schoolProfile(): BelongsTo
    {
        return $this->belongsTo(SchoolProfile::class);
    }

    /**
     * Berita terkait, jika foto ini bagian dari galeri sebuah berita.
     */
    protected function news(): BelongsTo
    {
        return $this->belongsTo(News::class);
    }
}
