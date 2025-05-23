@extends('website.master')


@section('content')
 <!-- Initiative Details Section -->
 <div class="container" style="margin-top: 100px;">


    <!-- Timeline Section -->
    <div class="row mt-5" data-aos="fade-up">
        <div class="col-12">
            <h3 class="mb-4">Initiative Requests</h3>
            <div class="timeline">


                @forelse ($requests as $request)

                <div class="card mb-3">
                    <div class="card-body">
                        <h5><i class="fas fa-chart-line"></i> Initiative Name: {{ $request->initiative->name }}</h5>
                        <p>{{ $request->initiative->details}}</p>
                        <p>Status : {{ $request->status }}</p>

                        <button class="btn btn-lg btn-primary me-3"><a style="color: white;  text-decoration: none;" href="{{ route('details.initiative',$request->initiative->id) }}">More Details</a></button>
                        <button class="btn btn-lg btn-danger me-3"><a style="color: white;  text-decoration: none;"  href="{{ route('initiatives.leave',$request->initiative->id) }}">Leave Initiatives</a></button>

                    </div>
                </div>
                @empty

                @endforelse
            </div>
        </div>
    </div>
</div>


@endsection
