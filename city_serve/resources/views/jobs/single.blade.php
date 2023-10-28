@extends('layouts.app')
@section('content')
    {{-- huda --}}
    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image"
        style="background-image: url('{{ asset('assets/images/home-bg.jpg') }}')" id="home-section">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1 class="text-white font-weight-bold">{{ $job->title }}</h1>
                    <div class="custom-breadcrumbs">
                        <a href="#">Home</a> <span class="mx-2 slash">/</span>
                        <a href="#">Job</a> <span class="mx-2 slash">/</span>
                        <span class="text-white"><strong>{{ $job->job_title }}</strong></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container mt-3">
        @if (\Session::has('save') || \Session::has('apply') || \Session::has('applied'))
            @foreach (['save', 'apply', 'applied'] as $key)
                @if (\Session::has($key))
                    <div class="alert alert-success">
                        <p>{!! \Session::get($key) !!}</p>
                    </div>
                @endif
            @endforeach
        @endif
    </div>

    <section class="site-section">
        <div class="container">
            <div class="row align-items-center mb-5">
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="border p-2 d-inline-block mb-3 rounded">
                                    <img src="{{ $job->image }}" class="img-fluid" alt="Image">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-2">
                                    <h2>{{ $job->title }}</h2>
                                </div>
                                <div class="mb-2">
                                    <span class="d-block"><span
                                            class="icon-briefcase mr-2"></span>{{ $job->company }}</span>
                                    <span class="d-block"><span class="icon-room mr-2"></span>{{ $job->location }}</span>
                                    <span class="d-block"><span class="icon-clock-o mr-2"></span><span
                                            class="text-primary">{{ $job->category_name }}</span></span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="mb-5">
                        <figure class="mb-5"></figure>
                        <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span
                                class="icon-align-left mr-3"></span>Opportunity Details</h3>
                        <p>
                            {{ $job->description }}
                        </p>
                    </div>
                    <div class="mb-5">
                        <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span
                                class="icon-rocket mr-3"></span>Skills Required</h3>
                        @php
                            $skills = explode(' ', $job->skills_required);
                        @endphp
                        @foreach ($skills as $skill)
                            <span style="color:white; padding:5px;" class="badge badge-success">{{ $skill }}</span>
                        @endforeach
                    </div>


                    <div class="mb-5">
                        <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span
                                class="icon-book mr-3"></span>Timeline</h3>
                        <p>
                            {{ date('M d, Y', strtotime($job->start_date)) }} -
                            {{ date('M d, Y', strtotime($job->end_date)) }}
                        </p>
                    </div>


                    <div class="mb-5">
                        <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span
                                class="icon-turned_in mr-3"></span>Applection deadline</h3>
                        <p> {{ date('M d, Y', strtotime($job->deadline)) }}
                        </p>
                    </div>

                    <div class="row mb-5">
                        @auth('web')
                            <div class="col-6">
                                <form action="{{ route('save.job') }}" method="POST">
                                    @csrf
                                    <input name="user_id" type="hidden" value="{{ Auth::user()->id }}">
                                    <input name="task_id" type="hidden" value="{{ $job->id }}">

                                    @if ($savedJob > 0)
                                        <button class="btn btn-block btn-success btn-md" disabled>Job Saved</button>
                                    @else
                                        <button name="submit" type="submit" class="btn btn-block btn-primary btn-md"><i
                                                class="icon-heart"></i>Save Job</button>
                                    @endif

                                    <!--add text-danger to it to make it read-->

                                </form>

                            </div>
                            <div class="col-6">
                                <form action="{{ route('apply.job') }}" method="POST">
                                    @csrf
                                    <input name="task_id" type="hidden" value="{{ $job->id }}">
                                    <input name="cv" type="hidden" value="{{ Auth::user()->cv }}">
                                    @if ($appliedJob > 0)
                                        <button type="submit" name="submit" class="btn btn-block btn-primary btn-md"
                                            disabled>You have Applied</button>
                                    @else
                                        <button type="submit" name="submit" class="btn btn-block btn-primary btn-md">Apply
                                            Now</button>
                                    @endif
                                </form>

                            </div>
                        @else
                            <div class="col-12">
                                <form action="{{ route('login') }}" method="get">
                                    @csrf
                                    <button type="submit" name="submit" class="btn btn-block btn-primary btn-md">Login To
                                        Apply</button>
                                </form>
                            </div>
                        @endauth
                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="bg-light p-3 border rounded mb-4">
                        <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Opportunity Details</h3>
                        <ul class="list-unstyled pl-3 mb-0">
                            <li class="mb-2"><strong class="text-black">Published on:</strong> {{ $job->created_at }}
                            </li>
                            <li class="mb-2"><strong class="text-black">Vacancy:</strong> {{ $job->vacancy }}</li>
                            <li class="mb-2"><strong class="text-black">Category:</strong>
                                {{ $job->title }}</li>
                            <li class="mb-2"><strong class="text-black">Job Location:</strong> {{ $job->location }}
                            </li>

                            <li class="mb-2"><strong class="text-black">Application
                                    Deadline:</strong> {{ date('M d, Y', strtotime($job->deadline)) }}</li>
                        </ul>
                    </div>

                    <div class="bg-light p-3 border rounded">
                        <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Share</h3>
                        <div class="px-3">
                            <a href="https://www.facebook.com/sharer/sharer.php?u=&quote='🌟 I just found an amazing work opportunity on Shaghenli! They\'re making a difference, and I\'m excited to join in. Check it out and get involved! 🙌 Join us on www.CityServe.com')"
                                class="pt-3 pb-3 pr-3 pl-0" target="_blank"><span class="icon-facebook"></span></a>

                            <a href="https://twitter.com/intent/tweet?text=🌟 I just found an amazing work opportunity on Shaghenli! They're making a difference, and I'm excited to join in. Check it out and get involved! 🙌 join us on  www.cityServe.com #Job #MakeADifference #Community "
                                class="pt-3 pb-3 pr-3 pl-0" target="_blank"><span class="icon-twitter"></span></a>

                            <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ route('single.job', $job->id) }}"
                                class="pt-3 pb-3 pr-3 pl-0" target="_blank"><span class="icon-linkedin"></span></a>
                        </div>
                    </div>
                    <div class="bg-light p-3 border mt-3 rounded mb-4">
                        <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Categories</h3>
                        <ul class="list-unstyled pl-3 mb-0">
                            @foreach ($categories as $category)
                                <li class="mb-2"><a class="text-decoration-none"
                                        href="{{ route('categories.single', $category->id) }}">{{ $category->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="site-section" id="next">
        <div class="container">

            <div class="row mb-5 justify-content-center">
                <div class="col-md-7 text-center">
                    <h2 class="section-title mb-2">{{ $relatedJobsCount }} Related Jobs</h2>
                </div>
            </div>

            <ul class="job-listings mb-5">
                @foreach ($relatedJobs as $job)
                    <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                        <a href="{{ route('single.job', $job->id) }}"></a>
                        <div class="job-listing-logo">
                            <img src="{{ $job->image }}" alt="Image" class="img-fluid">
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
                                <span class="badge badge-danger">{{ $job->category->name }}</span>
                            </div>
                        </div>

                    </li>
                @endforeach
            </ul>
        </div>
    </section>
@endsection
