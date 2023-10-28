@extends('layouts.app')

 @section('content')
 <section class="section-hero overlay inner-page bg-image" style="background-image: url('{{asset('assets/images/home-bg.jpg')}}')" id="home-section">
  <div class="container">
    <div class="row mr-5">
      <div class="col-lg-8 offset-lg-2">
        <div class="row">
  <h2 class="text-left mb-4" style="font-size: 32px; color:white">Contact Us</h2>
      </div>
    </div>
  </div>
  </div>
</section>
 <div class="container mt-5">
    <div class="row">
      <div class="col-lg-8 offset-lg-2">
        <h2 class="text-center mb-4" style="font-size: 40px;">Contact Us</h2>
        <div class="text-center">
            <img src="{{ asset('assets/images/contact us.jpg') }}" class="img-fluid rounded-circle mt-6 mb-6" alt="Jobs in action" style="width: 250px; height: 200px;">
          </div>
        <div class="text-center mt-4">
          <p>Have any questions or suggestions? Feel free to get in touch with us.</p>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-8">
            <h4 class="mt-4 mb-2 text-center">Contact Information</h4>
            <p class="text-center"><strong>Email:</strong> cityserve@gmail.com</p>
            <p class="text-center"><strong>Phone:</strong> +1 123-456-7890</p>
            <p class="text-center"><strong>Address:</strong> 123 Main Street, City, Country</p>
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
  <br>

 @endsection