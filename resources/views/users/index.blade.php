@extends('admin.master')


@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">USERS</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">My Users</h6>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                            {{ session('success') }}
                    </div>
                @endif
                <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Initiatives Joined</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($initiative_patr as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                <style>
                                                    ul.participant-list {
                                                        list-style: none; /* Remove default bullets */
                                                        padding: 0;
                                                        margin: 0;
                                                    }
                                                    ul.participant-list li {
                                                        background: #f5f8fa;
                                                        border: 1px solid #ddd;
                                                        border-radius: 6px;
                                                        padding: 12px 16px;
                                                        margin-bottom: 10px;
                                                        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
                                                        font-family: Arial, sans-serif;
                                                    }
                                                    ul.participant-list li strong {
                                                        color: #2c3e50;
                                                        width: 100px;
                                                        display: inline-block;
                                                    }
                                                </style>

                                                <ul class="participant-list">
                                                    @foreach($user->initiativeParticipants as $participant)
                                                        <li>
                                                            <strong>Initiative:</strong> {{ $participant->initiative->name ?? 'N/A' }} <br>
                                                            <strong>Status:</strong> {{ ucfirst($participant->status) }} <br>
                                                            <strong>Joined at:</strong> {{ $participant->created_at->format('Y-m-d') }}
                                                        </li>
                                                    @endforeach
                                                </ul>

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

