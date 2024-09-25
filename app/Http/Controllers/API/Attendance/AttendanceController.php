<?php

namespace App\Http\Controllers\API\Attendance;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Attendance\Attendance;
use Illuminate\Support\Facades\Validator;

class AttendanceController extends Controller
{

    public function attendance(Request $request)
    {
        $calculatorNumber = $request->calculatorNumber;
        $mypassword = $request->mypassword;

        $validator = Validator::make($request->all(), [
            'calculatorNumber' => 'required',

        ], [
            'calculatorNumber.required' => 'رقم الحاسبه مطلوب',

        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();

            return response()->json([
                'status' => false,
                'calculatorNumber' => $errors->first('calculatorNumber'),

            ]);
        }

        $Attendance = Attendance::where('calculator_number', $request->calculatorNumber)->where('mypassword', $request->mypassword)->first();

        if ($Attendance) {
            return response()->json([
                'status' => true,
                'Attendance' => $Attendance,
                //'token' => $Attendance->createToken(Hash::make($Attendance->calculator_number))->plainTextToken,
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'لا يوجد تطابق لهذه البيانات في سجلاتنا',
                'description' => 'تأكد من كتابة رقم الحاسبة بصورة صحيحة',
            ]);
        }
    }
}
