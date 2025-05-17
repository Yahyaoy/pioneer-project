<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationssController extends Controller
{
    public function index()
    {
        $notifications = Notification::all();
        return view('notifications.index',compact('notifications'));
    }


    public function create()
    {
        return view('notifications.create');
    }
}
