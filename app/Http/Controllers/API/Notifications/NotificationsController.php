<?php

namespace App\Http\Controllers\API\Notifications;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Notifications\Notifications;

class NotificationsController extends Controller
{
    public function WorkerNotifications(Request $request)
    {
        $request->validate([
            'calculator_number' => 'required|integer'
        ]);

        $notifications = Notifications::where('calculator_number', $request->calculator_number)
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'status' => '1',
            'notifications' => $notifications
        ]);
    }

    public function unreadNotifications(Request $request)
    {
        $request->validate([
            'calculator_number' => 'required|integer'
        ]);

        $notifications = Notifications::where('calculator_number', $request->calculator_number)
            ->whereNull('read_at')
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'status' => '1',
            'notifications' => $notifications
        ]);
    }

    public function markAsRead(Request $request)
    {
        $request->validate([
            'notification_id' => 'required|integer'
        ]);

        $notification = Notifications::find($request->notification_id);

        if (!$notification) {
            return response()->json([
                'status' => '0',
                'message' => 'الإشعار غير موجود'
            ]);
        }

        $notification->update([
            'read_at' => Carbon::now()
        ]);

        return response()->json([
            'status' => '1',
            'message' => 'تم تحديث حالة الإشعار بنجاح'
        ]);
    }

    public function markAsReadAll(Request $request)
    {
        $request->validate([
            'calculator_number' => 'required|integer'
        ]);

        Notifications::where('calculator_number', $request->calculator_number)
            ->whereNull('read_at')
            ->update(['read_at' => Carbon::now()]);

        return response()->json([
            'status' => '1',
            'message' => 'تم تحديث حالة جميع الإشعارات بنجاح'
        ]);
    }
}
