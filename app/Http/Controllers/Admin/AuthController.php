<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Organization;
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
            // بيانات المؤسسة
            'org_name' => 'required|string|max:255',
            'org_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'country' => 'required|string',
            'city' => 'required|string',
            'type' => 'required|string',
            'sector' => 'required|string',
            'size' => 'required|string',
            'founded_at' => 'nullable|date',
            'website' => 'nullable|url',

            // بيانات مدير الحساب
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:20|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'preferred_language' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // رفع الشعار إن وجد
        $logoPath = null;
        if ($request->hasFile('org_logo')) {
            $logoPath = $request->file('org_logo')->store('logos', 'public');
        }

        // إنشاء المستخدم
        $user = User::create([
            'name' => $request->first_name . ' ' . $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'job_title' => $request->job_title,
            'password' => Hash::make($request->password),
            'preferred_language' => $request->preferred_language,
            'role' => 'initiative_owner',
        ]);

        // إنشاء المؤسسة
        $organization = Organization::create([
            'name' => $request->org_name,
            'logo' => $logoPath,
            'country' => $request->country,
            'city' => $request->city,
            'type' => $request->type,
            'founded_at' => $request->founded_at,
            'website' => $request->website,
            'sector' => $request->sector,
            'size' => $request->size,
            'admin_id' => $user->id,
        ]);

        // ربط المستخدم بالمؤسسة
        $user->organization_id = $organization->id;
        $user->save();

        return redirect()->route('owner.login')->with('success', 'تم إنشاء المؤسسة وحساب المدير بنجاح!');
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
