<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    /**
     * Get all of the genres for the Movie
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
    public function rentals()
    {
        return $this->belongsToMany(Rental::class,'movie_rental');
    }
}
