<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;

    protected $fillable = [
        'series_id', 'title', 'description', 'season_number', 'episode_number',
        'duration_minutes', 'release_date', 'thumbnail_url', 'url'
    ];

    protected $casts = [
        'release_date' => 'date'
    ];


    public function series()
    {
        return $this->belongsTo(Series::class, "series_id", "id");
    }
}
