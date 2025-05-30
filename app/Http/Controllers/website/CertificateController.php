<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\Initiative;
use App\Models\InitiativeParticipant;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

        public function store(Request $request)
    {
        $request->validate([
            'participant_id' => 'required|exists:initiative_participants,id',
            'rating' => 'required|string|max:255',
        ]);

        $participant = InitiativeParticipant::with(['user', 'initiative'])->findOrFail($request->participant_id);
        $user = $participant->user;
        $initiative = $participant->initiative;

        // PDF file name
        $fileName = 'certificate_' . $user->id . '_' . time() . '.pdf';

        // Generate the PDF content
        $pdf = Pdf::loadView('certificates.pdf', [
            'user' => $user,
            'initiative' => $initiative,
            'rating' => $request->rating,
            'owner' => auth()->user()->name,
            'date' => now()->format('Y-m-d'),
        ]);

        // Save to storage/app/public/certificates
        Storage::disk('public')->put('certificates/' . $fileName, $pdf->output());

        // Save certificate record to DB
        Certificate::create([
            'user_id' => $user->id,
            'initiative_id' => $initiative->id,
            'title' => 'شهادة مشاركة في ' . $initiative->name,
            'description' => 'شارك المستخدم في المبادرة وحصل على تقييم: ' . $request->rating,
            'certificate_file' => 'certificates/' . $fileName,
            'owner_name' => auth()->user()->name,
        ]);

        return redirect()->back()->with('success', 'تم إصدار الشهادة بنجاح!');
    }


    // عرض قائمة الشهادات (اختياري)
    public function index()
    {
        $user = Auth::user();

        $certificates = Certificate::with(['participant.user', 'participant.initiative'])->get();

        return view('certificates.index', compact('certificates'));

    }
}
