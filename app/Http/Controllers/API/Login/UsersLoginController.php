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
}
