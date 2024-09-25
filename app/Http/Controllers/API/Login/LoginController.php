<?php

namespace App\Http\Controllers\API\Login;

use App\Http\Controllers\Controller;
use App\Models\NotifyToken\NotifyToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Workers\Workers;

class LoginController extends Controller
{
    public function login(Request $request){
        $calculatorNumber = $request->calculatorNumber;
        $mypassword = $request->mypassword;

        $validator = Validator::make($request->all(), [
            'calculatorNumber' => 'required',
            'mypassword' => 'required',
        ],[
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

        $Worker = Workers::where('calculator_number', $request->calculatorNumber)->
                    where('mypassword', $request->mypassword)->first();

        if($Worker)
        {
            return response()->json([
                'status' => true,
                'Worker' => $Worker,
                //'token' => $Worker->createToken(Hash::make($Worker->calculator_number))->plainTextToken,
            ]);
        }else{
            return response()->json([
                'status' => false,
                'message' => 'لا يوجد تطابق لهذه البيانات في سجلاتنا',
                'description' => 'تأكد من كتابة رقم الحاسبة وكلمة المرور بصورة صحيحة',
            ]);
        }
    }

    public function checkPassword(Request $request){
        $password = $request->password;

        $validator = Validator::make($request->all(), [
            'password' => 'required|min:4',
        ],
        [
            'password.required' => 'كلمة المرور مطلوبة',
            'password.min' => 'يجب ألا تقل كلمة المرور عن 4 رموز',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();

            return response()->json([
                'status' => false,
                'password' => $errors->first('password'),
            ]);
        }

        $Customer = Customers::find($request->id);
        if(!Hash::check($password, $Customer->password)){
            return response()->json([
                'status' => false,
                'message' => 'خطأ في كلمة المرور',
                'description' => 'اعد ادخال لكمة المرور بصورة صحيحة',
            ]);
        }else{
            if($Customer && $Customer->active){
                return response()->json([
                    'status' => true,
                ]);
            }
            if($Customer && !$Customer->active)
            {
                return response()->json([
                    'status' => false,
                    'message' => 'حسابك متوقف',
                    'description' => 'يرجى مراجعة الفرع الرئيسي لمعرفة السبب',
                ]);
            }
        }
    }
}
