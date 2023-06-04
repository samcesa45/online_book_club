<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserConnection extends Model
{
    use HasFactory,HasUuids;

    public $table = 'user_connections';

    protected $fillable = [
        'user_id',
        'connection_id',
    ];

    protected $hidden = [];
    protected $casts = [];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function connection()
    {
        return $this->belongsTo(\App\Models\User::class,'connection_id');
    }
}
