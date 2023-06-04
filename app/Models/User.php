<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasUuids;

    public $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'middle_name',
        'profile_picture_path',
        'date_of_birth',
        'telephone',
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

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
    /**
     * Get all of the comments for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function recommendations(): HasMany
    {
        return $this->hasMany(\App\Models\BookRecommendation::class);
    }

    public function discussions()
    {
        return $this->hasMany(\App\Models\Forum::class);
    }

    public function connections()
    {
        return $this->hasMany(\App\Models\UserConnection::class);
    }

    public function comments()
    {
        return $this->hasMany(\App\Models\Comment::class);
    }
    
}
