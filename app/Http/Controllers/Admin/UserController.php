<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Initiative;
use App\Models\InitiativeParticipant;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
        public function index()
        {
            $ownerId =  auth()->user()->organization_id;

            // جلب كل معرفات المبادرات التي يملكها هذا الowner
            $initiativeIds = Initiative::where('organization_id', $ownerId)->pluck('id');

            // جلب المستخدمين المشاركين في أي من هذه المبادرات
            $initiative_patr = User::whereHas('initiativeParticipants', function ($query) use ($initiativeIds) {
                $query->whereIn('initiative_id', $initiativeIds);
            })->with('initiativeParticipants.initiative')->get();

            return view('users.index', compact('initiative_patr'));
        }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
