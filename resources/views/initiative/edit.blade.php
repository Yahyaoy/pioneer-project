@extends('admin.master')

@section('content')
    <div class="container">
        <h2 class="mb-4 text-center">تعديل المبادرة</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('initiative.update', $initiative->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">اسم المبادرة</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $initiative->name) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">الموقع</label>
                <input type="text" name="location" class="form-control" value="{{ old('location', $initiative->location) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">تاريخ البداية</label>
                <input type="date" name="start_date" class="form-control" value="{{ old('start_date', $initiative->start_date) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">تاريخ الانتهاء</label>
                <input type="date" name="end_date" class="form-control" value="{{ old('end_date', $initiative->end_date) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">عدد المشاركين الأقصى</label>
                <input type="number" name="max_participants" class="form-control" value="{{ old('max_participants', $initiative->max_participants) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">عدد الساعات</label>
                <input type="number" name="hours" class="form-control" value="{{ old('hours', $initiative->hours) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">تفاصيل المبادرة</label>
                <textarea name="details" class="form-control" rows="5" required>{{ old('details', $initiative->details) }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">صورة المبادرة</label>
                @if ($initiative->image)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $initiative->image) }}" alt="Initiative Image" style="max-width: 200px;">
                    </div>
                @endif
                <input type="file" name="image" class="form-control">
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success">حفظ التعديلات</button>
            </div>
        </form>
    </div>
@endsection
