<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'release_date', 'description', 'thumbnail_url'
    ];

    protected $casts = [
        'release_date' => 'date'
    ];


    public function genres()
    {
        return $this->hasMany(SeriesGenre::class, "id");
    }

    public function episodes()
    {
        return $this->hasMany(Episode::class, "series_id", "id");
    }
}
