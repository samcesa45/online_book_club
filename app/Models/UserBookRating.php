<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBookRating extends Model
{
    use HasFactory,HasUuids;
    public $table = 'user_book_ratings';

    protected $fillable = [
        'user_id',
        'book_id',
        'rating',
    ];

    protected $hidden = [];
    protected $casts = [];


    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function book()
    {
        return $this->belongsTo(\App\Models\Book::class);
    }
}
