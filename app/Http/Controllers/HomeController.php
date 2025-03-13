<?php

namespace App\Http\Controllers;

use App\Models\Initiative;
use App\Models\News;
use App\Models\Organization;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        return response()->json([
            'latest_news' => News::latest()->take(4)->get(['id', 'title', 'details', 'image', 'news_date']),
            'organizations' => Organization::take(4)->get(['id', 'name', 'logo']),
            'featured_initiative' => Initiative::latest()->first(['id', 'name', 'details', 'image', 'start_date']),
            'latest_initiatives' => Initiative::latest()->take(4)->get(['id', 'name', 'organization_id', 'start_date', 'location']),
        ]);
    }

    //  View More News
    public function getNews()
    {
        return response()->json([
            'news' => News::latest()->paginate(10) // Paginate for better performance
        ]);
    }

    //  View More Organizations
    public function getOrganizations()
    {
        return response()->json([
            'organizations' => Organization::paginate(10)
        ]);
    }

    //  View Initiatives
    public function getInitiatives()
    {
        return response()->json([
            'initiatives' => Initiative::latest()->paginate(10)
        ]);
    }
}
