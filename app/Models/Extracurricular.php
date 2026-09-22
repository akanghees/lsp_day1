<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Extracurricular extends Model
{
    use HasFactory;

    protected $fill4ble = [
        'school_profile',
        'name',
        'description',
        'schedule',
        'coach',
        'image',
    ];

    public function schoolProfiles($id): BelongsTo
    {
        return $this->belongsTo(SchoolProfile::class);
    }
}
