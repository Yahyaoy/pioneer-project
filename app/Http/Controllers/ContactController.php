<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    //
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'phone' =>'required|string|max:20',
            'subject'=> 'required|string|max:255',
            'message'=> 'required|string',
        ]);

        $contactMessage = ContactMessage::create([
            'user_id' => Auth::check() ? Auth::id() : null,
            'full_name' => $request->full_name,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return response()->json([
            'message' => 'تم إرسال رسالتك بنجاح',
            'contact_message' => $contactMessage
        ], 201);
    }

    public function index()
    {
        return response()->json(ContactMessage::class::latest()->get());
    }

    public function show($id)
    {
        $message = ContactMessage::findOrFail($id);
        return response()->json($message);
    }
}
