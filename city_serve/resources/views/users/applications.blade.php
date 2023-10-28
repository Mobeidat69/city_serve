@extends('layouts.app')


@section('content')
    <section class="section-hero overlay inner-page bg-image"
        style="background-image: url('{{ asset('assets/images/home-bg.jpg') }}');" id="home-section">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1 class="text-white font-weight-bold">Applications</h1>
                    <div class="custom-breadcrumbs">
                        <a href="#">Home</a> <span class="mx-2 slash">/</span>
                        <a href="#">Job</a> <span class="mx-2 slash">/</span>
                        <span class="text-white"><strong>Saved Jobs</strong></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="site-section">
        <div class="container">

            <div class="row mb-5 justify-content-center">
                <div class="col-md-7 text-center">
                    <h2 class="section-title mb-2">Applications</h2>
                </div>
            </div>
            <ul class="job-listings mb-5 list-unstyled">
                @if ($applications->count() > 0)
                    @foreach ($applications as $application)
                        <li class="job-listing d-block d-sm-flex mb-2 align-items-center bg-white rounded"
                            style="height: 150px;">
                            <a href="{{ route('single.job', $application->task->id) }}"></a>
                            <div class="job-listing-logo">
                                <img src="{{ $application->task->image }}" alt="ask-image" class="img-fluid"
                                    style="height: 100%; object-fit: cover;">
                            </div>

                            <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                                <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                                    <h2>{{ $application->task->title }}</h2>
                                    <strong>{{ $application->task->company }}</strong>
                                </div>
                                <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                                    <span class="icon-room"></span> {{ $application->task->location }}
                                </div>
                            </div>
                        </li>
                    @endforeach
            </ul>
        @else
            <div class="container">
                <div class="alert alert-success">
                    <p> No applications yet </p>
                </div>
            </div>
            @endif



            </ul>
        </div>
    </section>


@endsection



