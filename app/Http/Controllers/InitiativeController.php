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
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'location' => 'required|string',
            'end_date' => 'required|date',
            'start_date' => 'required|date|after_or_equal:end_date',
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
        $initiatives =Initiative::all();
        return response()->json($initiatives);
    }

    // عرض تفاصيل مبادرة واحدة
    public function show($id)
    {
        $initiative = Initiative::with(['organization', 'participants.user'])->findOrFail($id);
        return response()->json($initiative);
    }

    //  تحديث بيانات المبادرة
    public function update(Request $request, $id)
    {
        $initiative = Initiative::findOrFail($id);

        if ($initiative->organization->admin_id !== Auth::id()) {
            return response()->json(['message' => 'غير مصرح لك بتعديل هذه المبادرة'], 403);
        }

        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'name' => 'sometimes|string|max:255',
            'location' => 'sometimes|string',
            'start_date' => 'sometimes|date|after_or_equal:end_date',
            'end_date' => 'sometimes|date',
            'max_participants' => 'sometimes|integer|min:1',
            'details' => 'nullable|string',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $initiative->update($request->all());

        return response()->json(['message' => 'تم تحديث المبادرة بنجاح', 'initiative' => $initiative]);
    }

    //  حذف مبادرة
    public function destroy($id)
    {
        $initiative = Initiative::findOrFail($id);

        if ($initiative->organization->admin_id !== Auth::id()) {
            return response()->json(['message' => 'غير مصرح لك بحذف هذه المبادرة'], 403);
        }

        $initiative->delete();

        return response()->json(['message' => 'تم حذف المبادرة بنجاح']);
    }

    // تقديم طلب انضمام لمبادرة
    public function requestToJoin(Request $request, $id)
    {
        //  جلب المبادرة والتحقق من وجودها
        $initiative = Initiative::findOrFail($id);

        //  التحقق من أن المستخدم مسجل دخول
        if (!Auth::check()) {
            return response()->json(['message' => 'يجب عليك تسجيل الدخول أولاً'], 401);
        }

        $userId = Auth::id();

        //  التأكد من أن المستخدم لم يطلب الانضمام من قبل
        if ($initiative->participants()->where('user_id', $userId)->exists()) {
            return response()->json(['message' => 'لقد تقدمت بطلب لهذه المبادرة بالفعل'], 400);
        }

        //  إنشاء طلب جديد للانضمام
        $participant = $initiative->participants()->create([
            'user_id' => $userId,
            'status' => 'pending' // الطلب قيد المراجعة افتراضيًا
        ]);

        return response()->json([
            'message' => 'تم تقديم طلبك بنجاح وهو قيد المراجعة',
            'initiative' => [
                'id' => $initiative->id,
                'name' => $initiative->name,
                'location' => $initiative->location
            ],
            'participant' => $participant
        ], 201);
    }


    public function manageParticipant(Request $request, $id, $participantId)
    {
        //  التحقق من صحة البيانات المدخلة
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'status' => 'required|in:accepted,rejected',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        //  جلب طلب الانضمام بناءً على المبادرة والمستخدم
        $participant = InitiativeParticipant::where('initiative_id', $id)
            ->where('id', $participantId)
            ->firstOrFail();

        //  تحديث الحالة (مقبول / مرفوض)
        $participant->update(['status' => $request->status]);

        return response()->json([
            'message' => 'تم تحديث حالة المشارك بنجاح',
            'participant' => [
                'id' => $participant->id,
                'user_id' => $participant->user_id,
                'initiative_id' => $participant->initiative_id,
                'status' => $participant->status,
                'updated_at' => $participant->updated_at,
            ]
        ]);
    }

    public function participants($id)
    {
        $participants = InitiativeParticipant::where('initiative_id', $id)
            ->where('status', 'accepted')
            ->with('user')
            ->get();

        return response()->json($participants);
    }

    // إلغاء الاشتراك في المبادرة
    public function leaveInitiative($id)
    {
        $participant = InitiativeParticipant::where('initiative_id', $id)
            ->where('user_id', Auth::id())
            ->first();

        if (!$participant) {
            return response()->json(['message' => 'لم تقم بالاشتراك في هذه المبادرة'], 400);
        }

        $participant->delete();

        return response()->json(['message' => 'تم إلغاء اشتراكك في المبادرة']);
    }

}
