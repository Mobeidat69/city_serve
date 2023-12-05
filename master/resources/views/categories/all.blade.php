@extends('layouts.app')


@section('content')
    <section class="section-hero overlay inner-page bg-image"
        style="background-image: url('{{ asset('assets/images/home-bg.jpg') }}');" id="home-section">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1 class="text-white font-weight-bold">Categories</h1>
                    <div class="custom-breadcrumbs">
                        <a href="#">Home</a> <span class="mx-2 slash">/</span>
                        <a href="#">Job</a> <span class="mx-2 slash">/</span>
                        <span class="text-white"><strong>Categories</strong></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="site-section">
        <div class="container">

            <div class="row mb-5 justify-content-center">
                <div class="col-md-7 text-center">
                    <h2 class="section-title mb-2">Categories</h2>
                </div>
            </div>
            @if ($categories->count() > 0)
                <div class="container">
                    <div class="row">
                        @foreach ($categories as $category)
                            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                <div class="card">
                                    <a href="{{ route('categories.single', $category->id) }}">
                                        <img src="{{ $category->image }}" alt="{{ $category->name }}-image"
                                            class="card-img-top img category-img">
                                    </a>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $category->name }}</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="container">
                    <div class="alert alert-success">
                        <p> No categories avalabile yet </p>
                    </div>
                </div>
            @endif
            </ul>
        </div>
    </section>
@endsection
