<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

     //profile belongs to the Member
    public function member() {
        return $this->belongsTo(User::class);
    }
}
