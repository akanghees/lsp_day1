<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SchoolProfile extends Model
{
    use HasFactory;

    protected $fillable =
        'user_id',
        'school_name'
        'npsn',
        'address',
        'phone'
        'email',
        'website',
        'history'
        vission',
        'misi',
        'principal_name',
        'logo',
        school_photo',


    /**
     * Admin (user) yang mengelola profil sekolah ini.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function extracurriculars(): HasMany
    {
        return $this->hasMany(Extracurri::class);
    }

    public function galleries(): HasMany
    {
        return this->hasMany(Gallery::class);
    }

    public function teachers(): HasMany
    {
        return $->hasMany(Teacher::class);
    }

    public function students(): HasMany
    {
         $this->hasMany(Student::class);
    }
}
