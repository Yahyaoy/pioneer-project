<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Initiative;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JoinInitiativeController extends Controller
{

    public function index($id)
    {
         $initiative = Initiative::where('id', $id)->first();
        if(!$initiative) {
            abort(404);
        }
        return view('website.initiatives.join',compact('initiative'));
    }

    public function requestToJoin(Request $request, $id)
    {
        //  جلب المبادرة والتحقق من وجودها
        $initiative = Initiative::findOrFail($id);

        //  التحقق من أن المستخدم مسجل دخول
        if (!Auth::check()) {
            return redirect()->back()->with('error','يجب عليك تسجيل الدخول أولاً');

            // return response()->json(['message' => 'يجب عليك تسجيل الدخول أولاً'], 401);
        }

        $userId = Auth::id();

        //  التأكد من أن المستخدم لم يطلب الانضمام من قبل
        if ($initiative->participants()->where('user_id', $userId)->exists()) {
            // return response()->json(['message' => 'لقد تقدمت بطلب لهذه المبادرة بالفعل'], 400);
            return redirect()->back()->with('error','لقد تقدمت بطلب لهذه المبادرة بالفعل');

        }

        //  إنشاء طلب جديد للانضمام
        $participant = $initiative->participants()->create([
            'user_id' => $userId,
            'status' => 'pending' // الطلب قيد المراجعة افتراضيًا
        ]);
        return redirect()->route('website.index')->with('success','تم تقديم طلبك بنجاح وهو قيد المراجعة');


        // return response()->json([
        //     'message' => 'تم تقديم طلبك بنجاح وهو قيد المراجعة',
        //     'initiative' => [
        //         'id' => $initiative->id,
        //         'name' => $initiative->name,
        //         'location' => $initiative->location
        //     ],
        //     'participant' => $participant
        // ], 201);
    }
}
