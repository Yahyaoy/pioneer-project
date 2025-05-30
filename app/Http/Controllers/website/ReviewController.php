<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Initiative;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function product_review(Request $request)
    {
        Review::create([
            'comment' => $request->comment,
            'star' => $request->rating,
            'initiative_id' => $request->initiative_id,
            'user_id' => Auth::id()
        ]);

        return redirect()->back()->with('success','Review Created Successfuly');
    }

    public function show($id)
    {
        $initiative = Initiative::with('reviews.user')->findOrFail($id);
        return view('review.show', compact('initiative'));
    }
}
