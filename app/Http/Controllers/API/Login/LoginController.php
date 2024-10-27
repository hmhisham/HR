<?php

namespace App\Http\Controllers\API\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Workers\Workers;

class LoginController extends Controller
{
  public function login(Request $request)
  {
    $calculatorNumber = $request->calculatorNumber;
    $mypassword = $request->mypassword;
    $workerToken = $request->worker_token;
    $newPassword = $request->newPassword;

    // Validate input
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

    // Check for worker by calculator number and password
    $Worker = Workers::where('calculator_number', $calculatorNumber)
      ->where('mypassword', $mypassword)
      ->first();

    if ($Worker) {
      // Save token if provided
      if ($workerToken) {
        $Worker->worker_token = $workerToken;
        $Worker->save();
      }

      if ($newPassword) {
        $Worker->mypassword = $newPassword;
        $Worker->save();
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
}
