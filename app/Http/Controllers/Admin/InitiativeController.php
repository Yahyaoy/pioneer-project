<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Initiative;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InitiativeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $initiatives = Initiative::where('organization_id',auth()->user()->organization_id)->get();
        return view('initiative.index',compact('initiatives'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $initiative = new Initiative();
        return view('initiative.create',compact('initiative'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string',
            'end_date' => 'required|date',
            'start_date' => 'required|date|after_or_equal:end_date',
            'max_participants' => 'required|integer|min:1',
            'details' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'hours' => 'required|integer|min:1'
        ]);

        // if ($validator->fails()) {

        //     return redirect()->back()->with('error','Something went error');
        // }

        $initiative = Initiative::create([
            'name' => $request->name,
            'organization_id' => Auth::user()->organization_id,
            'location' => $request->location,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'max_participants' => $request->max_participants,
            'details' => $request->details,
            'hours' => $request->hours,
            'image' => $request->file('image') ? $request->file('image')->store('initiatives') : null,
        ]);

        return redirect()->route('initiative.index')->with('success','تم إنشاء المبادرة بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(Initiative $initiative)
    {
        $initiative = Initiative::where('id','=',$initiative->id)->get();


        return view('initiative.show',compact('initiative'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Initiative $initiative)
    {
        $initiative = Initiative::find($initiative->id);


        return view('initiative.edit',compact('initiative'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $initiative = Initiative::findOrFail($id);

        // if ($initiative->organization->admin_id !== Auth::id()) {
        //     return response()->json(['message' => 'غير مصرح لك بتعديل هذه المبادرة'], 403);
        // }

        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'name' => 'sometimes|string|max:255',
            'location' => 'sometimes|string',
            'start_date' => 'sometimes|date|after_or_equal:end_date',
            'end_date' => 'sometimes|date',
            'max_participants' => 'sometimes|integer|min:1',
            'details' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'hours' => 'sometimes|integer|min:1'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $initiative->update($request->all());
        return redirect()->route('initiative.index')->with('success','تم تحديث المبادرة بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Initiative $initiative)
    {
        $initiative = Initiative::findOrFail($initiative->id);


        $initiative->delete();

        return redirect()->route('initiative.index')->with('success', 'Initiative Deleted Successfully');
    }
}
