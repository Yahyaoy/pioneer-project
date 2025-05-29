@extends('admin.master')

@section('content')
    <div class="container-fluid" style="padding-top: 60px">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ $news->title }}</h4>
                    </div>
                    <div class="card-body">
                        <p><strong>Date:</strong> {{ $news->created_at->format('Y-m-d') }}</p>

                        @if ($news->image)
                            <div class="text-center mb-3">
                                    <img src="{{ asset('storage/' . $news->image) }}" alt="News Image" style="max-width: 300px;">
                        @endif


                        <p><strong>Details:</strong></p>
                        <div>{!! nl2br(e($news->details)) !!}</div>

                    </div>

                    <div class="card-footer text-end">
                        <a href="{{ route('news.edit', $news->id) }}" class="btn btn-warning">Edit</a>
                        <a href="{{ route('news.index') }}" class="btn btn-secondary">Back</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
