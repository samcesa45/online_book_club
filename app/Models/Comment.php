<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory,HasUuids;

    public $table = 'comments';

    protected $fillable = [
        'comment_text',
        'user_id',
        'forum_id',
    ];

    protected $hidden = [];
    protected $casts = [];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function forum()
    {
        return $this->belongsTo(\App\Models\Forum::class);
    }
}
