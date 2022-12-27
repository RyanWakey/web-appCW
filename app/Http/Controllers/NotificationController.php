<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function sendNotification()
    {
        $commentData = [
            'name' => $this->user->name,
            'title' => $this->post->title,
            'URL' => route('posts.show',['post' => $this->post->id]);
        ]
    }
}
