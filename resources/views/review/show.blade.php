@extends('admin.master')

@section('content')
    <div class="container-fluid">
        <h2 class="mb-4">Reviews for Initiative: {{ $initiative->name }}</h2>

        @if($initiative->reviews->count())
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Comment</th>
                    <th>Stars</th>
                    <th>User</th>
                    <th>Created At</th>
                </tr>
                </thead>
                <tbody>
                @foreach($initiative->reviews as $review)
                    <tr>
                        <td>{{ $review->id }}</td>
                        <td>{{ $review->comment }}</td>
                        <td>{{ $review->star }}</td>
                        <td>{{ $review->user->name ?? 'N/A' }}</td>
                        <td>{{ $review->created_at->format('Y-m-d H:i') }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p>No reviews available for this initiative.</p>
        @endif

        <a href="{{ route('initiative.index') }}" class="btn btn-secondary mt-3">Back to Initiatives</a>
    </div>
@endsection
