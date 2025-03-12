<?php

namespace App\Http\Controllers;

use App\Mail\VerificationCodeMail;
use App\Models\InitiativeParticipant;
use App\Models\Notification;
use App\Models\Organization;
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
            'role' => 'normal_user',
        ]);

        $user->sendEmailVerificationNotification();
// إرسال إشعار إلى المستخدم الجديد
        Notification::create([
            'user_id' => $user->id,
            'title' => 'مرحبًا بك في تطبيقنا!',
            'message' => 'شكرًا لك على التسجيل. نحن سعداء بانضمامك إلينا!',
        ]);
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

        //  Generate API token
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


    //  تسجيل مؤسسة جديدة + مدير الحساب
    public function registerInitiativeOwner(Request $request)
    {
        $validator = Validator::make($request->all(), [
            //  بيانات المؤسسة
            'org_name' => 'required|string|max:255',
            'org_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'country' => 'required|string',
            'city' => 'required|string',
            'type' => 'required|string',
            'sector' => 'required|string',
            'size' => 'required|string',

            //  بيانات مدير الحساب
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'preferred_language' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        //  رفع صورة الشعار إن وجدت
        $logoPath = null;
        if ($request->hasFile('org_logo')) {
            $logoPath = $request->file('org_logo')->store('logos', 'public');
        }

        //  إنشاء حساب مدير المؤسسة أولاً
        $user = User::create([
            'name' => $request->first_name . ' ' . $request->last_name,
            'email' => $request->email,
            'job_title' => $request->job_title,
            'password' => Hash::make($request->password),
            'preferred_language' => $request->preferred_language,
            'role' => 'initiative_owner', //  تحديد الدور
        ]);

        //  إنشاء المؤسسة وربطها بالمستخدم كـ `admin_id`
        $organization = Organization::create([
            'name' => $request->org_name,
            'logo' => $logoPath,
            'country' => $request->country,
            'city' => $request->city,
            'type' => $request->type,
            'sector' => $request->sector,
            'size' => $request->size,
            'admin_id' => $user->id, // 🛑 الآن لدينا `user->id` ونربطه هنا
        ]);

        //  تحديث المستخدم بربطه بالمؤسسة
        $user->organization_id = $organization->id;
        $user->save();

        //  تسجيل الدخول تلقائيًا بعد التسجيل
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'تم إنشاء المؤسسة وحساب المدير بنجاح. يرجى التحقق من البريد الإلكتروني.',
            'organization' => $organization,
            'user' => $user,
            'token' => $token
        ], 201);
    }



}
