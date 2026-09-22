<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'content',

    ]:

    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
        ];
    }

    public function category(): BelongsTo
    {
        return $this->hasMany(:class);
    }

    /**
     * Foto galeri yang terkait dengan berita ini.
     */
    public function galler(): HasMany
    {
        return $this->belongsTo(Gallery:);
    }
}
