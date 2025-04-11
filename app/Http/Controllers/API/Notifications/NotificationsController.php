<?php

namespace App\Http\Controllers\API\Notifications;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Notifications\Notifications;
use Illuminate\Support\Facades\Validator;

class NotificationsController extends Controller
{
    public function WorkerNotifications(Request $request)
    {
        $request->validate([
            'computer_number' => 'required|integer'
        ]);

        $notifications = Notifications::where('computer_number', $request->computer_number)
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([

            'notifications' => $notifications
        ]);
    }

    public function WorkerNotificationsCount(Request $request)
    {
        // التحقق من صحة البيانات المدخلة
        $request->validate([
            'computer_number' => 'required|string'
        ]);

        // جلب عدد الإشعارات غير المقروءة
        $unreadCount = Notifications::where('computer_number', $request->computer_number)
                                  ->whereNull('read_at')
                                  ->count();

        // إرجاع النتيجة كرد JSON
        return response()->json([
            'success' => true,
            'message' => 'Unread notifications count retrieved successfully.',
            'unread_notifications_count' => $unreadCount
        ]);
    }


    public function unreadNotifications(Request $request)
    {
        $request->validate([
            'computer_number' => 'required|integer'
        ]);

        $notifications = Notifications::where('computer_number', $request->computer_number)
            ->whereNull('read_at')
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'status' => '1',
            'notifications' => $notifications
        ]);
    }




    public function markAsReadAll(Request $request)
    {
        $request->validate([
            'computer_number' => 'required|integer'
        ]);

        Notifications::where('computer_number', $request->computer_number)
            ->whereNull('read_at')
            ->update(['read_at' => Carbon::now()]);

        return response()->json([
            'status' => '1',
            'message' => 'تم تحديث حالة جميع الإشعارات بنجاح'
        ]);
    }



}
