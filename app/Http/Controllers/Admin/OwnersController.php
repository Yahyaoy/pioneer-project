<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class OwnersController extends Controller
{
    public function index(){
        $owners = User::where('role','initiative_owner')->get();
        return view('owner.index',compact('owners'));
    }


    public function create()
    {
        return view('owner.create');
    }
}
