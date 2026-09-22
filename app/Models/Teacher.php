<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_profile_id',
        'nisn',
        'name',
        'genders',
        'subject',
        'position',
        'image',
    ];

    public function schoolProfile(): BelongsTo
    {
        return $this->belongsTo(SchoolProfiles::class);
    }
}
