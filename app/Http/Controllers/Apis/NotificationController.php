<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Controller;
use App\Http\traits\ApiTrait;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller

{
    use ApiTrait;

/*    public function getUserNotifications()
    {
        $user = Auth::guard('sanctum')->user();
        $notifications = $user->unreadNotifications()->get();

        $formattedNotifications = $notifications->map(function ($notification) {
            return [
                'id' => $notification->id,
                'data' => $notification->data,
                'created_at' => $notification->created_at->diffForHumans(),
            ];
        });


        return $this->data(compact('formattedNotifications'), 'Notifications retrieved successfully');
    }*/


    // false=> unread notifications only , true=> all notifications including read notifications
    public function getUserNotifications($includeRead = false)
    {
        $user = Auth::guard('sanctum')->user();

        $notificationsQuery = $user->notifications();

        if (!$includeRead) {
            $notificationsQuery->whereNull('read_at');
        }

        $notifications = $notificationsQuery->get();

        $formattedNotifications = $notifications->map(function ($notification) {
            return [
                'id' => $notification->id,
                'data' => $notification->data,
                'created_at' => $notification->created_at->diffForHumans(),
                'read_at' => $notification->read_at,
            ];
        });

        return $this->data(compact('formattedNotifications'), 'Notifications retrieved successfully');
    }


    public function markNotificationAsRead($notificationId)
    {
        $user = Auth::guard('sanctum')->user();
        $notification = $user->notifications()->where('id', $notificationId)->firstOrFail();
        $notification->markAsRead();

        return $this->successMessage( 'Notification marked as read');
    }

    public function getNotificationDetails($notificationId)
    {
        $user = Auth::guard('sanctum')->user();
        $notification = $user->notifications()->findOrFail($notificationId);

        return $this->data(['notification' => $notification], 'Notification details retrieved successfully');
    }
    public function deleteNotification($notificationId)
    {
        $user = Auth::guard('sanctum')->user();
        $notification = $user->notifications()->where('id', $notificationId)->firstOrFail();

        $notification->delete();

        return $this->successMessage('Notification deleted successfully');
    }


}
