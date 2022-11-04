<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    // A Member has one profile
    public function profile() {
        return $this->hasOne(Profile::class);
    }

    // A Member has many posts
    public function posts() {
        return $this->hasMany(Post::class);
    }
}
