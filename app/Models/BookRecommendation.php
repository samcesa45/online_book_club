<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookRecommendation extends Model
{
    use HasFactory, HasUUids;

    public $table = 'book_recommendations';

    protected $fillable = [
      'user_id',
      'book_id',
    ];


    public function user(){
        return $this->belongsTo(\App\Models\User::class);
    }

    public function book()
    {
        return $this->belongsTo(\App\Models\Book::class);
    }
}
