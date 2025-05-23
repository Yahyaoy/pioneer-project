<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Initiative;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InitiativeRecommendationController extends Controller
{
    public function showRecommendationStepper()
    {
        return view('website.recommendations.stepper');
    }

    public function getRecommendations(Request $request)
    {
        // Validate the request
        $request->validate([
            'location' => 'required|string',
            'max_participants' => 'required|integer|min:1',
            'interests' => 'required|array',
            'interests.*' => 'string'
        ]);

        // Get base query for initiatives
        $recommendedInitiatives = Initiative::query()
            // ->where('status', 'active')
            ->where('end_date', '>', now());

        // Apply location filter
        $recommendedInitiatives->where(function($query) use ($request) {
            $query->where('location', $request->location);
                // ->orWhere('is_remote', true);
        });

        // Apply max participants filter
        $recommendedInitiatives->where('max_participants', '<=', $request->max_participants);

        // Apply interests filter directly from user selection
        // if (!empty($request->interests)) {
        //     $recommendedInitiatives->whereIn('interest_type', $request->interests);
        // }

        // Get initiatives with the most participants and highest ratings
        // $initiatives = $recommendedInitiatives
        //     ->withCount('participants')
        //     ->orderBy('participants_count', 'desc')
        //     // ->orderBy('rating', 'desc')
        //     ->limit(10)
        //     ->get();

        return response()->json([
            'success' => true,
            // 'recommendations' => $initiatives
        ]);
    }
}
