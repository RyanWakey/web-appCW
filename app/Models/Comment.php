<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    
    //A comment belongs to a member
    public function user(){
        return $this->belongsTo(User::class);
    }

    //A comment belongs to a post
    public function post(){
        return $this->belongsTo(Post::class);
    }   

    public function likes(){
        return $this->morphToMany(Like::class, 'likeable')->withPivot('like_id','likeable_id','likeable_type');
    }
}

