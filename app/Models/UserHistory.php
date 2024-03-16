<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'movie_id', 'series_id'
    ];


    public function movie()
    {
        return $this->belongsTo(Movie::class, "movie_id", "id");
    }

    public function series()
    {
        return $this->belongsTo(Series::class, "series_id", "id");
    }
}
