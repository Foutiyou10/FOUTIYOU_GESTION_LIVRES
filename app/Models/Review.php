<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'user_id',
        'book_id',
        'username',
        'comment',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function user()
    {
    return $this->belongsTo(User::class);
    }

}
