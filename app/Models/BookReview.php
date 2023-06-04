<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookReview extends Model
{
    use HasFactory,HasUuids;

    public $table ='book_reviews';

    protected $fillable = [
      'user_id',
      'book_id',
      'review_text',
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function book()
    {
        return $this->belongsTo(\App\Models\Book::class);
    }

}
