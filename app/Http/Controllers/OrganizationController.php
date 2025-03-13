<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    // Fetch all organizations
    public function index(Request $request)
    {
        $query = Organization::query();

        // Search filter
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $organizations = $query->select(['id', 'name', 'logo'])->get();

        return response()->json($organizations);
    }

    //
    public function show($id)
    {
        $organization = Organization::with('initiatives')->findOrFail($id);

        return response()->json([
            'id' => $organization->id,
            'name' => $organization->name,
            'logo' => asset('storage/' . $organization->logo),
            'website' => $organization->website,
            'country' => $organization->country,
            'city' => $organization->city,
            'type' => $organization->type,
            'sector' => $organization->sector,
            'size' => $organization->size,
            'founded_at' => $organization->founded_at,
            'initiatives' => $organization->initiatives->map(function ($initiative) {
                return [
                    'id' => $initiative->id,
                    'name' => $initiative->name,
                    'location' => $initiative->location,
                    'date' => $initiative->end_date,
                ];
            }),
        ]);
    }


}
