<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class NotificationController extends Controller
{
    public function markAsRead($id)
    {
        try {
            $notification = Notification::find($id);
            if (!$notification) {
                return response()->json(['message' => 'Notification not found'], 404);
            }else {
                $notification->update(['is_read' => 1]);
            }
            if (Auth::user()->type == 'user') {
                if ($notification->appointment_type == 'chat') {
                    $url = url('chat-list');
                } elseif ($notification->appointment_type == 'video' || $notification->appointment_type == 'audio') {
                    $url = url('upcoming-appointments');
                }
            } elseif (Auth::user()->type == 'astrologer') {
                if ($notification->appointment_type == 'chat') {
                    $url = url('chats');
                } elseif ($notification->appointment_type == 'video' || $notification->appointment_type == 'audio') {
                    $url = url('astrologer-appointments');
                }
            }
            return redirect($url);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Something went wrong', 'error' => $e->getMessage()], 500);
        }
    }

}
