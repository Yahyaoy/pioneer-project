<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function showLoginOwnerForm()
    {
        return view('auth.owner.login');
    }
    public function loginOwner(Request $request)
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
        if ($user->role !== 'initiative_owner') {
            Auth::logout(); // logout immediately
            return redirect()->back()->with('error','بيانات اعتماد غير صالحة');

       }

        // Create token
        $token = $user->createToken('OwnerToken')->plainTextToken;

    //     flasher()->addSuccess('مرحبًا بك مرة أخرى، مالك!');

    // return redirect()->route('admin.index')
    //     ->with('token', $token)
    //     ->with('user', $user);

    return redirect()->route('admin.index')->with('success','مرحبًا بك مرة أخرى، مالك!');

    }


    public function showRegisterOwnerForm(){
        return view('auth.owner.register');
    }


    public function registerOwner(Request $request)
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
        'role' => 'initiative_owner',
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

    return redirect()->route('owner.login')->with('success','تم إنشاء الحساب بنجاح!');
}



public function logout(Request $request)
{

    if(Auth::user()->role == 'admin'){
    Auth::logout();
        return redirect()->route('admin.login')->with('success', 'You have been logged out.');
    }else{
        Auth::logout();
        return redirect()->route('owner.login')->with('success', 'You have been logged out.');
    }


}





public function showLoginAdminForm()
{
    return view('auth.admin.login');
}

public function loginAdmin(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    $credentials = $request->only('email', 'password');

    // Attempt login
    if (!Auth::attempt($credentials)) {
        Auth::logout(); // logout immediately


        return redirect()->back()->with('error','بيانات اعتماد غير صالحة');
    }


    $user = Auth::user();

    // Check if the user has 'owner' role
    if ($user->role !== 'admin') {
        Auth::logout(); // logout immediately
        return redirect()->back()->with('error','بيانات اعتماد غير صالحة');

   }

    // Create token
    $token = $user->createToken('AdminToken')->plainTextToken;

//     flasher()->addSuccess('مرحبًا بك مرة أخرى!');

// return redirect()->route('admin.index')
//     ->with('token', $token)
//     ->with('user', $user);

return redirect()->route('admin.index')->with('success','مرحبًا بك مرة أخرى!');

}




// public function registerAdmin(Request $request)
// {
//     $validator = Validator::make($request->all(), [
//         'name' => 'required|string|max:255',
//         'email' => 'required|string|email|max:255|unique:users',
//         'phone' => 'required|string|max:20|unique:users',
//         'password' => 'required|string|min:6',
//     ]);

//     if ($validator->fails()) {
//         flasher()->addError('فشل في إنشاء الحساب. تحقق من الحقول.');
//         return redirect()->back()->withErrors($validator)->withInput();
//     }

//     $user = User::create([
//         'name' => $request->name,
//         'phone' => $request->phone,
//         'email' => $request->email,
//         'password' => Hash::make($request->password),
//         'role' => 'admin',
//     ]);

//     // Send verification email (optional)
//     // $user->sendEmailVerificationNotification();

//     // // Add notification
//     // Notification::create([
//     //     'user_id' => $user->id,
//     //     'title' => 'مرحبًا بك في تطبيقنا!',
//     //     'message' => 'شكرًا لك على التسجيل. نحن سعداء بانضمامك إلينا!',
//     // ]);

//     flasher()->addSuccess('تم إنشاء الحساب بنجاح!');

//     return redirect()->route('login'); // or any route you want
// }

}
