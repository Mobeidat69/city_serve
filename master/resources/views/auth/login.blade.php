@extends('layouts.app')

@section('content')
    <!-- hero section -->
    <section  class="mt-n4 section-hero overlay inner-page bg-image" style="background-image: url({{ asset('assets/images/home-bg.jpg') }});" id="home-section">

        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1 class="text-white font-weight-bold">Log In</h1>
                    <div class="custom-breadcrumbs">
                        <a href="#">Home</a> <span class="mx-2 slash">/</span>
                        <span class="text-white"><strong>Log In</strong></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <form action="{{ route('login') }}" method="POST" class="m-5 p-4 border rounded">
                    @csrf
                    <div class="row form-group">
                        <div class="col-md-12 mb-3 mb-md-0">
                            <label class="text-black" for="fname">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        </div>
                    </div>
                    <div class="row form-group mb-4">
                        <div class="col-md-12 mb-3 mb-md-0">
                            <label class="text-black" for="fname">Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <input type="submit" name="submit" value="Log In" class="btn px-4 btn-primary text-white">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
