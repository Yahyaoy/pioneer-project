<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthWebsiteController extends Controller
{
    public function showUserLoginForm()
    {
        return view('website.auth.login');
    }



    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        // Attempt login
        if (!Auth::attempt($credentials)) {

            return redirect()->back()->with('error','بيانات اعتماد غير صالحة');
        }

        $user = Auth::user();

        // Check if the user has 'owner' role
        if ($user->role !== 'normal_user') {
            Auth::logout(); // logout immediately
            return redirect()->back()->with('error','بيانات اعتماد غير صالحة');

       }

        // Create token
        $token = $user->createToken('UserToken')->plainTextToken;

    //     flasher()->addSuccess('مرحبًا بك مرة أخرى، مالك!');

    // return redirect()->route('admin.index')
    //     ->with('token', $token)
    //     ->with('user', $user);

    return redirect()->route('website.index')->with('success','مرحبًا بك مرة أخرى، ');



    }



    public function showUserRegisterForm()
    {
        return view('website.auth.register');

    }


    public function registerUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:20|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            // flasher()->addError('فشل في إنشاء الحساب. تحقق من الحقول.');
            return redirect()->back()->withErrors($validator)->withInput();
            // dd($validator);
        }

        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'normal_user',
        ]);

        // Send verification email (optional)
        // $user->sendEmailVerificationNotification();

        // // Add notification
        // Notification::create([
        //     'user_id' => $user->id,
        //     'title' => 'مرحبًا بك في تطبيقنا!',
        //     'message' => 'شكرًا لك على التسجيل. نحن سعداء بانضمامك إلينا!',
        // ]);

        // flasher()->addSuccess('تم إنشاء الحساب بنجاح!');

        // return redirect()->route('login'); // or any route you want

        return redirect()->route('user.login')->with('success','تم إنشاء الحساب بنجاح!');

    }



    public function logoutUser()
    {
        Auth::logout();
        return redirect()->route('website.index')->with('success', 'You have been logged out.');

    }



    public function showUserProfile()
    {
        $user_date = auth()->user();
        return view('website.auth.profile',compact('user_date'));
    }



}
