<?php

namespace App\Http\Controllers\API\Attendance;

use App\Http\Controllers\Controller;
use App\Models\Attendance\Attendance;  // Model Attendance
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AttendanceController extends Controller
{
    public function getAttendanceByCalculatorNumber(Request $request)
    {
        // الحصول على calculatorNumber من الطلب
        $calculatorNumber = $request->calculatorNumber;

        // التحقق من صحة المدخلات
        $validator = Validator::make($request->all(), [
            'calculatorNumber' => 'required',
        ],[
            'calculatorNumber.required' => 'رقم الحاسبة مطلوب',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json([
                'status' => false,
                'calculatorNumber' => $errors->first('calculatorNumber'),
            ]);
        }

        // جلب بيانات الحضور بناءً على calculator_number
        $attendances = Attendance::where('calculator_number', $calculatorNumber)->get();

        if($attendances->isEmpty()){
            return response()->json([
                'status' => false,
                'message' => 'لا توجد بيانات حضور لهذا المستخدم',
            ]);
        }

        // في حالة وجود بيانات
        return response()->json([
            'status' => true,
            'attendances' => $attendances,
        ]);
    }
}
