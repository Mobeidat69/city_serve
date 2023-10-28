@extends('layouts.app')
@section('content')
    {{-- huda --}}
    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image"
        style="background-image: url('{{ asset('assets/images/home-bg.jpg') }}');" id="home-section">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1 class="text-white font-weight-bold">Search Results</h1>
                    <div class="custom-breadcrumbs">
                        <a href="#">Home</a> <span class="mx-2 slash">/</span>
                        <a href="#">Job</a> <span class="mx-2 slash">/</span>
                        <span class="text-white"><strong>Search Results</strong></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <section class="site-section">
            <div class="container">

                <div class="row mb-5 justify-content-center">
                    <div class="col-md-7 text-center">
                        <h2 class="section-title mb-2">Search Results</h2>
                    </div>
                </div>
                <ul class="job-listings  p-3">
                    @if ($searches->count() > 0)
                        @foreach ($searches as $job)
                            <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                                <a href="{{ route('single.job', $job->id) }}"></a>
                                <div class="job-listing-logo">
                                    <img src="{{ $job->image }}" alt="image" class="img-fluid">
                                </div>

                                <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                                    <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                                        <h2>{{ $job->title }}</h2>
                                        <strong>{{ $job->company }}</strong>
                                    </div>
                                    <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                                        <span class="icon-room"></span> {{ $job->location }}
                                    </div>
                                    <div class="job-listing-meta">
                                        <span class="badge badge-danger"> {{ $job->category->name }}</span>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    @else
                        <div class="container ">
                            <div class="alert alert-danger" style="margin: 0">
                                <p> We're very sorry we don't have what you searched yet, try again later </p>
                            </div>
                </ul>
            </div>
            @endif




    </div>
    </section>


@endsection
