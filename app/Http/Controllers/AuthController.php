<?php

namespace App\Http\Controllers;

use App\Mail\VerificationCodeMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // 🔹  تسجيل مستخدم جديد
    public function register(Request $request)
    {
        $validator= Validator::make($request->all(), [
            'name'=> 'required|string|max:255',
            'email'=> 'required|string|email|max:255|unique:users',
            'phone' =>'required|string|max:20|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if($validator->fails())
        {
          return response()->json(['errors'=> $validator->errors()], 422);
        }

        $user = User::create([
            'name' => $request->name,
            'phone'=> $request->phone,
            'email' =>$request->email,
            'password'=> Hash::make($request->password),
        ]);

//        $user->sendEmailVerificationNotification();

        return response()->json([
            'message' => 'تم إنشاء الحساب.',
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone,
                ]
        ], 201);
    }

}
