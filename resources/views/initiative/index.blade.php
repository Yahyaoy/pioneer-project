@extends('admin.master')


@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Initiative</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">My Initiative</h6>
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
                                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0"
                                    role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending" style="width: 59px;">
                                                Id</th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending" style="width: 59px;">
                                                Title</th>

                                                <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending" style="width: 59px;">
                                                Start Date For Initiative</th>

                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Start date: activate to sort column ascending"
                                                style="width: 122px;">End Date For Initiative</th>


                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Start date: activate to sort column ascending"
                                            style="width: 122px;">Max Participants</th>

                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Start date: activate to sort column ascending"
                                            style="width: 122px;">Hours</th>

                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Start date: activate to sort column ascending"
                                                style="width: 122px;">Reviews</th>
                                            {{-- <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Start date: activate to sort column ascending"
                                            style="width: 122px;">Status</th> --}}

                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Start date: activate to sort column ascending"
                                            style="width: 122px;">Image</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 109px;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($initiatives as $initiative)
                                            <tr class="odd">
                                                <td class="sorting_1">{{ $initiative->id }}</td>

                                                <td>{{ $initiative->name }}</td>
                                                <td>{{ $initiative->start_date }}</td>
                                                <td>{{ $initiative->end_date}}</td>
                                                <td>{{ $initiative->max_participants }}</td>
                                                <td>{{ $initiative->hours }}</td>
                                                <td>
                                                    <a href="{{ route('initiatives.review', $initiative->id) }}" class="btn btn-primary mt-3">
                                                        Show All Reviews
                                                    </a>
                                                {{-- <td>{{ $initiative->status }}</td> --}}



                                                <td>
                                                    <img src="{{ asset('storage/' . $initiative->image) }}" alt="Initiative Image" height="80" width="80">

                                                </td>
                                                <td>
                                                    <form id="delete-form" action="{{ route('initiative.destroy', $initiative->id) }}"
                                                        method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                    <a href="#" class="btn btn-danger btn-sm"
                                                    onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this city?')) document.getElementById('delete-form').submit();"><i class="fas fa-trash"></i></a>



                                                    <a href="{{ route('initiative.show',$initiative->id) }}" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>

                                                    <a href="{{ route('initiative.edit',$initiative->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
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

