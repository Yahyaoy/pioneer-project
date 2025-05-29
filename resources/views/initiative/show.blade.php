@extends('admin.master')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Users For Initiative</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Participants List</h6>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>User Name</th>
                            <th>Initiative Name :</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($initiative->participants as $participant)
                            <tr>
                                <td>{{ $participant->id }}</td>
                                <td>{{ $participant->user->name ?? 'No Name' }}</td>
                                <td>{{ $initiative->name ?? 'No Name' }}</td>
                                <td>{{ $participant->status }}</td>
                                <td>{{ $participant->created_at }}</td>
                                <td>{{ $participant->updated_at }}</td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No participants found.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
