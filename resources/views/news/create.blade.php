@extends('admin.master')






@section('content')
    <div class="container-fluid" style="padding-top: 60px">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Add News</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data">
                            @csrf

                            @include('news._form')


                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
