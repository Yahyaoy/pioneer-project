<?php

namespace App\Http\Controllers;

use App\Mail\VerificationCodeMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;

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

        $user->sendEmailVerificationNotification();

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

    public function login(Request $request)
    {
        //  Validate the input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Check if credentials are valid
        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()->json(['message' => 'Invalid email or password'], 401);
        }

        // Get the authenticated user
        $user = Auth::user();

        // ✅ Generate API token
        $token = $user->createToken('API Token')->plainTextToken;

        // Return response with user data and token
        return response()->json([
            'message' => 'Login successful',
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
            ],
            'token' => $token
        ]);
    }



}
