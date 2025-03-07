<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    //  جيب جميع الإشعارات للمستخدم
    public function index() {
        $notifications = Notification::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        return response()->json($notifications);
    }

    //  وضع الإشعار كـ "مقروء"
    public function markAsRead($id) {
        $notification = Notification::where('id',$id)->where('user_id',Auth::id())->first();
        if ($notification) {
            $notification->update(['is_read'=> true]);
            return response()->json(['message' => 'تم التعليم كمقروء']);
        }
        return response()->json(['message' => 'فش اشعار'], 404);
    }

    // حذف الإشعار
    public function destroy($id) {
        $notification = Notification::where('id', $id)->where('user_id', Auth::id())->first();
        if ($notification) {
            $notification->delete();
            return response()->json(['message' => 'تم حذف الاشعار']);
        }
        return response()->json(['message' => 'لا يوجد اشعار'], 404);
    }

    // ✅ إنشاء إشعار جديد (يُستخدم عند حدوث حدث جديد مثل رسالة أو انضمام لمبادرة)
    public function store(Request $request) {
        $request->validate([
            'user_id' =>'required|exists:users,id',
            'title'=> 'required|string|max:255',
            'message'=> 'required|string',
        ]);

        $notification = Notification::create($request->all());
        return response()->json(['message' => 'Notification created', 'notification' => $notification]);
    }
}
