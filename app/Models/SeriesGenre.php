<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeriesGenre extends Model
{
    use HasFactory;

    protected $fillable = [
        'series_id', 'genre_id'
    ];


    public function genre()
    {
        return $this->belongsTo(Genre::class, "genre_id", "id");
    }
}
