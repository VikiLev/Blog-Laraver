<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Category extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name'
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    protected $casts = [
        'published' => 'boolean',
    ];

    protected $dates = [
        'published_at'
    ];

}
