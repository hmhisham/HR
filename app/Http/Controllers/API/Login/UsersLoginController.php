<?php

namespace App\Http\Controllers\API\Login;

use Illuminate\Http\Request;
use App\Models\Usersapp\Usersapp;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UsersLoginController extends Controller
{
    public function updateToken(Request $request)
    {
        $request->validate([
            'computer_number' => 'required',
            'token' => 'required'
        ]);

        $user = Usersapp::where('computer_number', $request->computer_number)->first();

        if (!$user) {
            return response()->json([
                'status' => '0',
                'message' => 'لم يتم العثور على المستخدم'
            ], 404);
        }

        $user->token = $request->token;
        $user->save();

        return response()->json([

            'user' => $user
        ]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'computer_number' => 'required',
            'password' => 'required',
        ]);

        // البحث عن المستخدم حسب رقم الحاسبة
        $user = Usersapp::where('computer_number', $request->computer_number)->first();

        // التحقق من وجود المستخدم
        if ($user && $user->verifyPassword($request->password)) {
            return response()->json([

                'user' => $user,
            ]);
        } else {
            return response()->json([
                'status' => '0',
                'message' => 'بيانات الدخول غير صحيحة',
            ]);
        }
    }


    public function changePassword(Request $request)
{
    $request->validate([
        'computer_number' => 'required',
        'old_password' => 'required',
        'new_password' => 'required|min:6',
    ]);

    $user = Usersapp::where('computer_number', $request->computer_number)->first();

    if (!$user) {
        return response()->json([
            'status' => '0',
            'message' => 'المستخدم غير موجود',
        ], 404);
    }

    if (!Hash::check($request->old_password, $user->password)) {
        return response()->json([
            'status' => '0',
            'message' => 'كلمة المرور القديمة غير صحيحة',
        ], 400);
    }

    $user->setRawAttributes(array_merge($user->getAttributes(), ['password' => Hash::make($request->new_password)]));
    $user->save();

    return response()->json([
        'status' => '1',
        'message' => 'تم تغيير كلمة المرور بنجاح',
    ]);
}

}
