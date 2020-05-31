<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;

class NotificationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the notifications
     *
     * @return view
     */
    public function index()
    {
        $notifications = Auth::user()->unreadNotifications;
        return view('notification', compact('notifications'));
    }
}
