@extends('layouts.app')

@section('content')
<section class="section-hero overlay inner-page bg-image" style="background-image: url('{{ asset('assets/images/home-bg.jpg') }}')" id="home-section">
  <div class="container">
    <div class="row mr-5">
      <div class="col-lg-8 offset-lg-2">
        <div class="row">
          <h2 class="text-left mb-4" style="font-size: 32px; color: white">Discover Job Opportunities in Aqaba</h2>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="container mt-5">
  <div class="row">
    <div class="col-lg-8 offset-lg-2">
      <div class="row">
        <div class="col-lg-6">
          <h2 class="text-left mb-4" style="font-size: 32px;">Welcome to Shaghenli Job Portal, Aqaba</h2>
          <p style="font-size: 20px;">Explore exciting career opportunities in Aqaba! Shaghenli is your gateway to meaningful work and positive change in the vibrant city of Aqaba.</p>
        </div>
        <div class="col-lg-6">
          <div class="text-center">
            <img src="{{ asset('assets/images/3_picture.jpg') }}" class="img-fluid rounded-circle mt-4 mb-4" alt="Jobs in action" style="width: 200px; height: 200px;">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <h3 class="text-left mt-4 mb-2" style="font-size: 28px;">Join Shaghenli and Explore Job Opportunities</h3>
          <p style="font-size: 20px;">Are you ready to shape your career in Aqaba? Join Shaghenli's community and discover job opportunities that align with your aspirations and skills.</p>
        </div>
        <div class="col-lg-6">
          <div class="row">
            <div class="col-md-6">
              <div class="text-center">
                <img src="{{ asset('assets/images/act.png') }}" class="img-fluid rounded mt-4 mb-4" alt="Job 1" style="width: 300px; height: 200px;">
              </div>
            </div>
            <div class="col-md-6">
              <div class="text-center">
                <img src="{{ asset('assets/images/ayla.jpg') }}" class="img-fluid rounded mt-4 mb-4" alt="Job 2" style="width: 300px; height: 200px;">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
@endsection
