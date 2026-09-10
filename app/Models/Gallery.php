<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_profile_id',
        'news_id',
        'title',
        'description',
        'image',
    ];

    public function schoolProfile(): BelongsTo
    {
        return $this->belongsTo(SchoolProfile::class);
    }

    /**
     * Berita terkait, jika foto ini bagian dari galeri sebuah berita.
     */
    public function news(): BelongsTo
    {
        return $this->belongsTo(News::class);
    }
}
