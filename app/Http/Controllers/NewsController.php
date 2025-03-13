<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    // عرض جميع الأخبار
    public function index()
    {
        $news = News::with('organization')->orderBy('news_date','desc')->get();
        return response()->json($news);
    }

    // عرض خبر معين
    public function show($id)
    {
        $news = News::with('organization')->findOrFail($id);
        return response()->json($news);
    }

    // إنشاء خبر جديد
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'details' =>'required|string',
            'image'=> 'nullable|image|max:2048',
        ]);

        // حفظ الصورة إن وجدت
        $imagePath = $request->file('image') ? $request->file('image')->store('news_images', 'public') : null;

        $news = News::create([
            'title' => $request->title,
            'details' =>$request->details,
             'image' =>$imagePath,
            'organization_id'=> Auth::user()->organization_id, // المؤسسة الخاصة بالمستخدم
             'news_date' => now(),
        ]);

        return response()->json(['message' => 'تم نشر الخبر بنجاح', 'news' => $news], 201);
    }

    // تحديث خبر
    public function update(Request $request, $id)
    {
        $news = News::findOrFail($id);

        // التحقق من صلاحيات التعديل
        if ($news->organization_id !== Auth::user()->organization_id) {
            return response()->json(['message' => 'ليس لديك صلاحية لتعديل هذا الخبر'], 403);
        }

        // التحقق من المدخلات
        $validatedData = $request->validate([
            'title' => 'nullable|string|max:255',
            'details' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        DB::beginTransaction();
        try {
            // تحديث الحقول النصية فقط عند وجود بيانات جديدة
            $news->update([
                'title' => $validatedData['title'] ?? $news->title,
                'details' => $validatedData['details'] ?? $news->details,
            ]);

            // التحقق مما إذا كان المستخدم يريد حذف الصورة القديمة
            if ($request->has('image') && $request->image === 'null') {
                if ($news->image) {
                    Storage::disk('public')->delete($news->image); // حذف الصورة القديمة
                }
                $news->image = null;
            }

            // رفع صورة جديدة إذا تم إرسالها
            if ($request->hasFile('image')) {
                // حذف الصورة القديمة قبل استبدالها
                if ($news->image) {
                    Storage::disk('public')->delete($news->image);
                }
                $news->image = $request->file('image')->store('news_images', 'public');
            }

            $news->save();
            DB::commit();

            return response()->json([
                'message' => 'تم تحديث الخبر بنجاح',
                'news' => $news
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'حدث خطأ أثناء تحديث الخبر',
                'error' => $e->getMessage()
            ], 500);
        }
    }



    // حذف خبر
    public function destroy($id)
    {
        $news = News::findOrFail($id);

        if ($news->organization_id !== Auth::user()->organization_id) {
            return response()->json(['message' => 'ليس لديك صلاحية لحذف هذا الخبر'], 403);
        }

        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }

        $news->delete();

        return response()->json(['message' => 'تم حذف الخبر بنجاح']);
    }

}
