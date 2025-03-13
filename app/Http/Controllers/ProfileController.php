<?php

namespace App\Http\Controllers;

use App\Models\InitiativeParticipant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{

    // عرض الملف الشخصي
    public function show()
    {
        $user = Auth::user();

        // حساب مجموع الساعات لكل المبادرات التي شارك فيها المستخدم
        $totalHours = InitiativeParticipant::where('user_id', $user->id)
            ->join('initiatives', 'initiative_participants.initiative_id', '=', 'initiatives.id')
            ->sum('initiatives.hours'); // نفترض أن جدول المبادرات يحتوي على حقل 'hours'

        // تحديث حقل ساعات التطوع في جدول المستخدمين
        $user->update(['volunteer_hours' => $totalHours]);

        return response()->json([
            'name' => $user->name,
            'email' => $user->email,
            'volunteer_hours' => $user->volunteer_hours, // عرض عدد الساعات
            'initiatives_count' => InitiativeParticipant::where('user_id', $user->id)->count(),
        ]);
    }

    //  تحديث المعلومات الأساسية
    public function update(Request $request)
    {
        $user = Auth::user();

        // تحقق من صحة البيانات
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20|unique:users,phone,' . $user->id,
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // تحديث البيانات
        if ($request->hasFile('profile_picture')) {
            // احذف الصورة القديمة إن وجدت
            if ($user->profile_picture) {
                Storage::disk('public')->delete($user->profile_picture);
            }
            // احفظ الصورة الجديدة
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $path;
        }

        $user->update([
            'name' => $request->name,
            'phone' => $request->phone,
        ]);

        return response()->json(['message' => 'تم تحديث البيانات بنجاح', 'user' => $user]);
    }
}
