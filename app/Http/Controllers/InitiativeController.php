<?php

namespace App\Http\Controllers;

use App\Models\Initiative;
use App\Models\InitiativeParticipant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;

class InitiativeController extends Controller
{
// إنشاء مبادرة جديدة
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'location' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'max_participants' => 'required|integer|min:1',
            'details' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $initiative = Initiative::create([
            'name' => $request->name,
            'organization_id' => Auth::user()->organization_id,
            'location' => $request->location,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'max_participants' => $request->max_participants,
            'details' => $request->details,
            'image' => $request->file('image') ? $request->file('image')->store('initiatives') : null,
        ]);

        return response()->json(['message' => 'تم إنشاء المبادرة بنجاح', 'initiative' => $initiative], 201);
    }

    // عرض جميع المبادرات
    public function index()
    {
        $initiatives =Initiative::with('organization')->get();
        return response()->json($initiatives);
    }

    // عرض تفاصيل مبادرة واحدة
    public function show($id)
    {
        $initiative = Initiative::with(['organization', 'participants.user'])->findOrFail($id);
        return response()->json($initiative);
    }

    // تقديم طلب انضمام لمبادرة
    public function requestToJoin(Request $request, $id)
    {
        $initiative = Initiative::findOrFail($id);

        // التأكد أن المستخدم لم يتقدم من قبل
        if (InitiativeParticipant::where('initiative_id', $id)->where('user_id', Auth::id())->exists()) {
            return response()->json(['message' => 'لقد تقدمت بطلب لهذه المبادرة بالفعل'], 400);
        }

        InitiativeParticipant::create([
            'initiative_id' => $id,
            'user_id' => Auth::id(),
            'status' => 'pending'
        ]);

        return response()->json(['message' => 'تم تقديم طلبك بنجاح وهو قيد المراجعة'], 201);
    }

    public function manageParticipant(Request $request, $id, $participantId)
    {
        $validator = Validator::make($request->all(), [
            'status' => 'required|in:accepted,rejected',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $participant = InitiativeParticipant::where('initiative_id', $id)
            ->where('id', $participantId)
            ->firstOrFail();

        $participant->update(['status' => $request->status]);

        // إرسال إشعار للمبرمج
       // $participant->user->notify(new InitiativeParticipationStatus($request->status, $participant->initiative->name));

        return response()->json([
            'message' => 'تم تحديث حالة المشارك',
            'participant' => $participant
        ]);
    }

}
