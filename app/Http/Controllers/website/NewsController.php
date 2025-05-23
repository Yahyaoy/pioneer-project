<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function newsDetails($id)
    {
        $news = News::where('id', $id)->first();
        if(!$news) {
            abort(404);
        }
        return view('website.news.details',compact('news'));
    }
}
