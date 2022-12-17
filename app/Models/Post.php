<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // A post belongs to a User
    public function user() {
        return $this->belongsTo(User::class); 
    }
    
    // A post has many Comments
    public function comments() {
        return $this->hasMany(Comment::class); 
    }
}
