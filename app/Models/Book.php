<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Casts\Attribute;
class Book extends Model
{
    use HasFactory, HasUuids;

    public $table ='books';

    protected $fillable = [
       'title',
       'author',
       'description',
       'cover_image_path',
       'cover_image',
       
    ];

    protected $hidden = [];
    protected $casts = [];


    protected function coverImage(): Attribute
    {
    return Attribute::make(
        get: fn ($value) => str_contains($value,'http') ? $value : Storage::url($value),
    );
    
    }

    public function ratings()
    {
        return $this->hasMany(\App\Models\UserBookRating::class);
    }

    public function readingLists()
    {
      return $this->hasMany(\App\Models\ReadingList::class);
    }

    public function reviews()
    {
        return $this->hasMany(\App\Models\BookReview::class);
    }

    public function recommendations()
    {
        return $this->hasMany(\App\Models\BookRecommendation::class);
    }

    public function discussions()
    {
        return $this->hasMany(\App\Models\Forum::class);
    }
}
