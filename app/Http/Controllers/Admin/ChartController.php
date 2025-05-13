<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Initiative;
use App\Models\User;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function getChartData()
    {
        $pendingBookos = Initiative::where('role', 'pending')->count();
        $approvedBookos = Initiative::where('role', 'approved')->count();
        $rejectedBooks = Initiative::where('role', 'rejected')->count();

        // You can also retrieve other data as needed from the users table

        return response()->json([
            'labels' => ['Pending', 'Approved', 'Rejicted'],
            'values' => [$pendingBookos, $approvedBookos, $rejectedBooks],
        ]);
    }


    public function getDonutChartData()
    {
        // Replace this with your actual data retrieval logic
        $activeUsersCount = User::where('role', 'active')->count();
        $inactiveUsersCount = User::where('role', 'inactive')->count();

        return response()->json([
            'labels' => ['Active', 'Inactive'],
            'values' => [$activeUsersCount, $inactiveUsersCount],
        ]);
    }
}
