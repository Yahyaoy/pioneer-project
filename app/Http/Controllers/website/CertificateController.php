<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function index()
    {
        $certificates = Certificate::where('user_id',auth()->user()->id)->get();

    
    }
}
