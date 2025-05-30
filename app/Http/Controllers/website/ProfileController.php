<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\Initiative;
use App\Models\InitiativeParticipant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    // public function index()
    // {
    //     $user = Auth::user();
    //     $certificates = Certificate::where('user_id',auth()->user()->id)->get();


    //     // $initiativeParticipant = InitiativeParticipant::where('user_id',auth()->user()->id)->get();

    //     // $initiatives = Initiative::where('id',$initiativeParticipant-['initiative_id'])->get();

    //     // dd($initiatives);
    //     return view('website.auth.profile',compact('user','certificates'));
    // }

    public function index()
    {
        $user = Auth::user();

        $certificates = collect(); // Empty collection by default
        $initiatives = collect();

        if ($user->role === 'normal_user') {
            $certificates = Certificate::where('user_id', $user->id)->get();
            $initiatives = $user->joinedInitiatives;
        }

        return view('website.auth.profile', compact('user', 'certificates', 'initiatives'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('website.auth.edit-profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only('name', 'email', 'phone');

        if ($request->hasFile('profile_image')) {
            // Delete old image if exists
            if ($user->profile_image) {
                Storage::delete($user->profile_image);
            }

            $path = $request->file('profile_image')->store('profile_images', 'public');
            $data['profile_image'] = $path;
        }

        $user->update($data);

        return redirect()->route('user.profile')->with('success', 'Profile updated successfully.');
    }
}
