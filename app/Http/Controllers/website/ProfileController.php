<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\Initiative;
use App\Models\InitiativeParticipant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    $certificates = Certificate::where('user_id', $user->id)->get();
    $initiatives = $user->joinedInitiatives;

    return view('website.auth.profile', compact('user', 'certificates', 'initiatives'));
}

}
