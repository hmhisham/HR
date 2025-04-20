<?php

namespace App\Http\Controllers\API\Attendance;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Attendance\Attendance;
use Illuminate\Support\Facades\Validator;

class AttendanceController extends Controller
{
  public function getAttendance($computer_number)
  {
    // جلب بيانات الحضور باستخدام رقم الحاسبة
    $attendance = Attendance::where('computer_number', $computer_number)
      ->orderBy('Att_Date', 'desc')
      ->get();

    if ($attendance->isEmpty()) {
      // إذا لم يتم العثور على بيانات، يتم إرجاع status = false
      return response()->json([
        'status' => false,
        'message' => 'لايوجد بيانات'
      ], 404);
    }

    // إذا تم العثور على بيانات، يتم إرجاع status = true مع جميع البيانات
    return response()->json([
      'status' => true,
      'data' => $attendance
    ], 200);
  }
}
