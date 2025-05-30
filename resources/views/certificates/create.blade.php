@extends('admin.master')

@section('content')
    <div class="container mt-4">
        <h2>📝 إصدار شهادة للمشارك</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('certificates.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group mt-3">
                <label for="participant_id">👤 اختر المشارك:</label>
                <select name="participant_id" id="participant_id" class="form-control" required>
                    <option value="">-- اختر المشارك --</option>
                    @foreach($participants as $participant)
                        <option value="{{ $participant->id }}">
                            {{ $participant->user->name }} - {{ $participant->initiative->name }} (الحالة: {{ $participant->status }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mt-3">
                <label for="rating">⭐ التقييم:</label>
                <select name="rating" id="rating" class="form-control" required>
                    <option value="">اختر التقييم</option>
                    <option value="Excellent">Excellent</option>
                    <option value="Very Good">Very Good</option>
                    <option value="Good">Good</option>
                    <option value="Acceptable">Acceptable</option>
                </select>
            </div>

{{--            <div class="form-group mt-3">--}}
{{--                <label for="certificate_file">📄 رفع ملف الشهادة (PDF/صورة - اختياري):</label>--}}
{{--                <input type="file" name="certificate_file" id="certificate_file" class="form-control-file">--}}
{{--            </div>--}}

            <button type="submit" class="btn btn-primary mt-4">🎓 إصدار الشهادة</button>
        </form>
    </div>
@endsection
