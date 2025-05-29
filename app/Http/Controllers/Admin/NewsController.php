<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(auth()->user()->role == 'admin')
        {
         $all_news = News::all();

        }else{
         $all_news = News::where('organization_id',auth()->user()->organization_id)->get();

        }
        return view('news.index',compact('all_news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $news = new News();
        return view('news.create', compact('news'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd(auth()->user()->organization_id);
        $request->validate([
            'title' => 'required|string|max:255',
            'details' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        // حفظ الصورة إن وجدت
        $imagePath = $request->file('image') ? $request->file('image')->store('news_images', 'public') : null;

        $news = News::create([
            'title' => $request->title,
            'details' => $request->details,
            'image' => $imagePath,
            'organization_id' => Auth::user()->organization_id, // المؤسسة الخاصة بالمستخدم
            'news_date' => now(),
        ]);


        return redirect()->route('news.index')->with('success', 'News Created Successfuly');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
//        $news = News::where('id','=',$news->id)->get();


        return view('news.show',compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        $news = News::find($news->id);


        return view('news.edit',compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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

            // return response()->json([
            //     'message' => 'تم تحديث الخبر بنجاح',
            //     'news' => $news
            // ]);
            return redirect()->route('news.index')->with('success', 'تم تحديث الخبر بنجاح');
        } catch (\Exception $e) {
            DB::rollBack();
            // return response()->json([
            //     'message' => 'حدث خطأ أثناء تحديث الخبر',
            //     'error' => $e->getMessage()
            // ], 500);
            return redirect()->route('news.index')->with('error', 'حدث خطأ أثناء تحديث الخبر');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        $news = News::findOrFail($news->id);


        $news->delete();

        return redirect()->route('news.index')->with('success', 'News Deleted Successfully');
    }
}
