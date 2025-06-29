<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{

    public function __invoke(Request $request)
    {
        $notifications = auth()->user()->notifications()
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        // Mark notifications as read
        auth()->user()->unreadNotifications->markAsRead();

        return view('notifications.index', [
            'notifications' => $notifications,
        ]);
    }
}
