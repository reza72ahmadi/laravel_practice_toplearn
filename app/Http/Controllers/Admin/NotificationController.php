<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function readAll()
    {
        $notifications = Notification::all();
        foreach ($notifications as $notification) {
            $notification->update(['read_at' => now()]);
        }
    }

    // public function readAll()
    // {
    //     try {
    //         $notifications = Notification::all();
    //         foreach ($notifications as $notification) {
    //             $notification->update(['read_at' => now()]);
    //         }
    //         return response()->json(['message' => 'Notifications marked as read successfully.'], 200);
    //     } catch (\Exception $e) {
    //         return response()->json(['error' => 'Failed to update notifications.'], 500);
    //     }
    // }
}
