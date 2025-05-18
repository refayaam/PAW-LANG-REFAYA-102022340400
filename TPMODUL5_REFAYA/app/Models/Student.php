<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Student extends Model
{
    protected $table = 'students';

    protected $fillable = [
        // Fillable columns
        'name',
        'nim',
        'major',
        'faculty',
        'profile_photo',
    ];

    protected function profilePhoto(): Attribute
    {
        // Mengembalikan URL lengkap ke foto profil
        return Attribute::make(
            get: fn ($value) => asset('storage/profile_photo/' . $value)
        );
    }
}
