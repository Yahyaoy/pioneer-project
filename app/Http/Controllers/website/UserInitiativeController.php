<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\InitiativeParticipant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserInitiativeController extends Controller
{
    public function index($id)
    {
        $initiatives = InitiativeParticipant::where('user_id',$id)->get();
        return view('website.initiatives.user_initiative',compact('initiatives'));
    }



    public function userInitiativeRequests()
    {
        $requests = InitiativeParticipant::where('user_id',auth()->user()->id)->get();

        return view('website.requests.user_requests',compact('requests'));
    }


    public function leaveInitiative($id)
    {
        $participant = InitiativeParticipant::where('initiative_id', $id)
            ->where('user_id', Auth::id())
            ->first();

        if (!$participant) {
            return redirect()->back()->with('error', 'لم تقم بالاشتراك في هذه المبادرة');
        }

        $participant->delete();
        return redirect()->back()->with('success', 'تم إلغاء اشتراكك في المبادرة');

    }
}
