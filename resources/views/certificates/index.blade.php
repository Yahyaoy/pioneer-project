@extends('admin.master')

@section('content')
    <div class="container mt-4">
        <h2>📜 All Certificates</h2>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Participant</th>
                <th>Initiative</th>
                <th>Rating</th>
                <th>Issued At</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($certificates as $certificate)
                <tr>
                    <td>{{ $certificate->user->name ?? '-' }}</td>
                    <td>{{ $certificate->initiative->name ?? '-' }}</td>
                    <td>{{ $certificate->description }}</td>
                    <td>{{ $certificate->created_at->format('Y-m-d') }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
