@extends('layouts.app')


@section('content')
    <section class="section-hero overlay inner-page bg-image"
        style="background-image: url({{ asset('assets/images/home-bg.jpg') }});" id="home-section">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-7">
                    <div class="card p-3 py-4">
                        <div class="container">
                            @if (\Session::has('update'))
                                <div class="alert alert-success">
                                    <p>{!! \Session::get('update') !!}</p>
                                </div>
                            @endif
                        </div>
                        <div class="text-center d-flex justify-content-center">
                            <div class="rounded-circle" style="width: 240px; height: 240px; overflow: hidden;">
                                <img src="{{ $profile->image }}" width="100" height="100"
                                    style="object-fit: cover; width: 100%; height: 100%;">
                            </div>
                        </div>
                        <div class="text-center mt-3">
                            <h5 class="mt-2 mb-0">{{ $profile->name }}</h5>
                            <a href="{{ $profile->cv }}" target="_blank" class="btn btn-success btn-block text-white">Download Cv</a>
                            <div class="px-4 mt-1">
                                <p class="fonts">{{ $profile->bio }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
