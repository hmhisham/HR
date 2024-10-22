<?php

namespace App\Http\Controllers\API\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Workers\Workers;

class LoginController extends Controller
{

  public function login(Request $request)
  {
    $calculatorNumber = $request->calculatorNumber;
    $mypassword = $request->mypassword;
    $workerToken = $request->worker_token; // استلام التوكن

    // طباعة التوكن للتأكد من استلامه
    \Log::info('Worker Token: ' . $workerToken);

    // التحقق من صحة البيانات
    $validator = Validator::make($request->all(), [
      'calculatorNumber' => 'required',
      'mypassword' => 'required',
    ], [
      'calculatorNumber.required' => 'أسم المستخدم مطلوب',
      'mypassword.required' => 'كلمة المرور مطلوبة',
    ]);

    if ($validator->fails()) {
      $errors = $validator->errors();
      return response()->json([
        'status' => false,
        'calculatorNumber' => $errors->first('calculatorNumber'),
        'mypassword' => $errors->first('mypassword'),
      ]);
    }

    // البحث عن العامل باستخدام calculator_number
    $Worker = Workers::where('calculator_number', $calculatorNumber)->first();

    // التحقق من العامل وكلمة المرور
    if ($Worker) {
      // حفظ التوكن في حال تم استلامه
      if ($workerToken) {
        $Worker->worker_token = $workerToken;
        $Worker->save(); // حفظ البيانات
      }

      return response()->json([
        'status' => true,
        'Worker' => $Worker,
      ]);
    } else {
      return response()->json([
        'status' => false,
        'message' => 'لا يوجد تطابق لهذه البيانات في سجلاتنا',
        'description' => 'تأكد من كتابة رقم الحاسبة وكلمة المرور بصورة صحيحة',
      ]);
    }
  }


  public function checkPassword(Request $request)
  {
    $password = $request->password;

    // التحقق من صحة البيانات
    $validator = Validator::make(
      $request->all(),
      [
        'password' => 'required|min:3',
      ],
      [
        'password.required' => 'كلمة المرور مطلوبة',
        'password.min' => 'يجب ألا تقل كلمة المرور عن 3 رموز',
      ]
    );

    if ($validator->fails()) {
      $errors = $validator->errors();
      return response()->json([
        'status' => false,
        'password' => $errors->first('password'),
      ]);
    }
  }
}
