@extends('layouts.app')


@section('content')
    <section class="section-hero overlay inner-page bg-image"
        style="background-image: url('{{ asset('assets/images/home-bg.jpg') }}');" id="home-section">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1 class="text-white font-weight-bold">Update Details</h1>
                    <div class="custom-breadcrumbs">
                        <a href="#">Home</a> <span class="mx-2 slash">/</span>
                        <a href="#">Job</a> <span class="mx-2 slash">/</span>
                        <span class="text-white"><strong>Update Details</strong></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="site-section">
        <div class="container">

            <div class="row align-items-center mb-5">
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <div class="d-flex align-items-center">
                        <div>
                            <h2>Update User Details</h2>
                        </div>
                    </div>
                </div>
                @if (\Session::has('update'))
                    <div class="container">
                        <div class="alert alert-success">
                            <p>{!! \Session::get('update') !!}</p>
                        </div>
                    </div>
                @endif
            </div>
            <div class="row mb-5">
                <div class="col-lg-12">
                    <form class="p-4 p-md-5 border rounded" enctype="multipart/form-data"
                        action="{{ route('update.details') }}" method="post">
                        @csrf
                        <!--User details-->
                        <div class="form-group">
                            <label for="job-title">Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        @if ($errors->has('image'))
                            <p class="alert alert-danger">{{ $errors->first('image') }}</p>
                        @endif
                        <div class="form-group">
                            <label for="job-title">Name</label>
                            <input type="text" value="{{ $userDetails->name }}" name="name" class="form-control"
                                id="job-title" placeholder="Name">
                        </div>
                        @if ($errors->has('name'))
                            <p class="alert alert-danger">{{ $errors->first('name') }}</p>
                        @endif

                        <div class="form-group">
                            <label for="job-title">CV</label>
                            <input type="file" name="cv" class="form-control">
                        </div>
                        @if ($errors->has('cv'))
                            <p class="alert alert-danger">{{ $errors->first('cv') }}</p>
                        @endif

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="">bio</label>
                                <textarea name="bio" id="" value="{{ $userDetails->bio }}" cols="30" rows="7"
                                    class="form-control" placeholder="Write bio..."></textarea>
                            </div>
                        </div>
                        @if ($errors->has('bio'))
                            <p class="alert alert-danger">{{ $errors->first('bio') }}</p>
                        @endif


                        <div class="col-lg-4 ml-auto">
                            <div class="row">
                                <div class="col-6">
                                    <input type="submit" name="submit" class="btn btn-block btn-primary btn-md"
                                        style="margin-left: 200px;" value="Update User">
                                </div>
                            </div>
                        </div>


                    </form>
                </div>


            </div>

        </div>
    </section>
@endsection
