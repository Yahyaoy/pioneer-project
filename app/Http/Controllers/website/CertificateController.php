<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\Initiative;
use App\Models\InitiativeParticipant;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    // عرض صفحة إنشاء شهادة
    public function create()
    {
        $ownerId = auth()->user()->organization_id;

        // جلب مبادرات المالك
        $initiatives = Initiative::where('organization_id', $ownerId)->pluck('id');

        // جلب المشاركين في مبادراته مع بيانات المستخدم والمبادرة
        $participants = InitiativeParticipant::with('user', 'initiative')
            ->whereIn('initiative_id', $initiatives)
            ->get();

        return view('certificates.create', compact('participants'));
    }

    // حفظ الشهادة
    public function store(Request $request)
    {
        $request->validate([
            'participant_id' => 'required|exists:initiative_participants,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'certificate_file' => 'nullable|file|mimes:pdf,jpg,png',
        ]);

        $participant = InitiativeParticipant::findOrFail($request->participant_id);

        $filePath = null;
        if ($request->hasFile('certificate_file')) {
            $filePath = $request->file('certificate_file')->store('certificates', 'public');
        }

        Certificate::create([
            'user_id' => $participant->user_id,
            'initiative_id' => $participant->initiative_id,
            'title' => $request->title,
            'description' => $request->description,
            'certificate_file' => $filePath,
            'owner_name' => auth()->user()->name,
        ]);

        return redirect()->back()->with('success', 'تم منح الشهادة بنجاح.');
    }

    // عرض قائمة الشهادات (اختياري)
    public function index()
    {
        $ownerId = auth()->user()->organization_id;
        $initiatives = Initiative::where('organization_id', $ownerId)->pluck('id');

        $certificates = Certificate::with('user', 'initiative')
            ->whereIn('initiative_id', $initiatives)
            ->get();

        return view('certificates.index', compact('certificates'));
    }
}
