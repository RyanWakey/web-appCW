<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function sendNotification()
    {
       Notification::send(auth()->user(), CommentPostNotifcation($user,$post,$comment));
    }
}
