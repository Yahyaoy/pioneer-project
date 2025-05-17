<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function inex(){
        return view('website.index');
    }


    public function details(){
        return view('website.details');
    }
}
