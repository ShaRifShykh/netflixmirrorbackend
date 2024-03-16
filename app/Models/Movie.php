<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'release_date', 'description', 'duration_minutes',
        'thumbnail_url', 'url'
    ];

    protected $casts = [
        'release_date' => 'date'
    ];


    public function genres()
    {
        return $this->hasMany(MovieGenre::class, "id");
    }
}
