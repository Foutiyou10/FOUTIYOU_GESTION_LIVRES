<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{


    protected $fillable = [
        'title',
        'author',
        'description',
        'published_at',
    ];

    /**
     * Un livre a plusieurs avis.
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
