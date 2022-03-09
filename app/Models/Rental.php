<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;
    public function movies()
    {
        return $this->belongsToMany(Movie::class,'movie_rental');
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
