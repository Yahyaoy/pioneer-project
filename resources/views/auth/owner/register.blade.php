<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register Owner</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<section class="py-5" style="background-color: #508bfc;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-lg">
                    <form action="{{ route('owner.register') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body p-4">
                            <h3 class="mb-4 text-center">تسجيل مؤسسة جديدة</h3>

                            {{-- عرض الأخطاء --}}
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <h5 class="mb-3">بيانات المؤسسة</h5>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>اسم المؤسسة</label>
                                    <input type="text" name="org_name" class="form-control" value="{{ old('org_name') }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>شعار المؤسسة (اختياري)</label>
                                    <input type="file" name="org_logo" class="form-control">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label>الدولة</label>
                                    <input type="text" name="country" class="form-control" value="{{ old('country') }}" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label>المدينة</label>
                                    <input type="text" name="city" class="form-control" value="{{ old('city') }}" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label>نوع المؤسسة</label>
                                    <input type="text" name="type" class="form-control" value="{{ old('type') }}" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label>القطاع</label>
                                    <input type="text" name="sector" class="form-control" value="{{ old('sector') }}" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label>حجم المؤسسة</label>
                                    <select name="size" class="form-control" required>
                                        <option value="" disabled {{ old('size') ? '' : 'selected' }}>اختر الحجم</option>
                                        <option value="small" {{ old('size') == 'small' ? 'selected' : '' }}>صغيرة</option>
                                        <option value="medium" {{ old('size') == 'medium' ? 'selected' : '' }}>متوسطة</option>
                                        <option value="large" {{ old('size') == 'large' ? 'selected' : '' }}>كبيرة</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label>تاريخ التأسيس (اختياري)</label>
                                    <input type="date" name="founded_at" class="form-control" value="{{ old('founded_at') }}">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>موقع المؤسسة (اختياري)</label>
                                    <input type="url" name="website" class="form-control" value="{{ old('website') }}">
                                </div>
                            </div>

                            <hr class="my-4">

                            <h5 class="mb-3">بيانات مدير الحساب</h5>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>الاسم الأول</label>
                                    <input type="text" name="first_name" class="form-control" value="{{ old('first_name') }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>الاسم الأخير</label>
                                    <input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>المسمى الوظيفي</label>
                                    <input type="text" name="job_title" class="form-control" value="{{ old('job_title') }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>البريد الإلكتروني</label>
                                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>رقم الهاتف</label>
                                    <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>اللغة المفضلة</label>
                                    <select name="preferred_language" class="form-control" required>
                                        <option value="ar" {{ old('preferred_language') == 'ar' ? 'selected' : '' }}>العربية</option>
                                        <option value="en" {{ old('preferred_language') == 'en' ? 'selected' : '' }}>English</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>كلمة المرور</label>
                                    <input type="password" name="password" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>تأكيد كلمة المرور</label>
                                    <input type="password" name="password_confirmation" class="form-control" required>
                                </div>
                            </div>

                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary btn-lg">تسجيل الحساب</button>
                            </div>

                            <div class="mt-3 text-center">
                                لديك حساب بالفعل؟ <a href="{{ route('owner.login') }}">سجّل الدخول</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
