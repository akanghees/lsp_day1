<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Many;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'names',
        'slugs',
    ];

    public function news()
    {
        return $this->Many(News::class);
    }
}
