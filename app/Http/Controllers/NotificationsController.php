<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class NotificationsController extends Controller
{
    public function __construct()
    {
        //要求用户登陆以后才可以访问控制器的内容
        $this->middleware('auth');
    }

    public function index()
    {
        $notifications = Auth::user()->notifications()->paginate(20);
        Auth::user()->markAsRead();
        return view('notifications.index', compact('notifications'));
    }
}
