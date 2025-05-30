<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Initiative;
use App\Models\InitiativeParticipant;
use App\Models\News;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {
        $initiatives = Initiative::all();
        $users = User::where('role', 'normal_user')->get();
        $all_news = News::all();
        // $initiatives_count = Initiative::count();
        // $users_count = User::count();
        // $news_count = News::count();
        // dd($initiatives);

        return view(
            'website.index',
        )->with([
            'initiatives' => $initiatives,
            'users' => $users,
            'all_news' => $all_news,

        ]);
    }


    public function details($id)
    {
        $initiative = Initiative::where('id', $id)->first();
        if(!$initiative) {
            abort(404);
        }


        $reviews = Review::where('initiative_id',$id)->get();

        // $participant = InitiativeParticipant::where('initiative_id',$initiatives->id)->get();

        // dd($participant);Initiatives
        return view('website.Initiatives.details',compact('initiative','reviews'));
    }
}
