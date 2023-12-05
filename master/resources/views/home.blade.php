 @extends('layouts.app')

 @section('content')
     <!-- HOME -->
     <section class="home-section section-hero overlay bg-image "
         style="margin-top:-24px;background-image: url('{{ asset('assets/images/home-bg.jpg') }}');" id="home-section">

         <div class="container">
             <div class="row align-items-center justify-content-center">
                 <div class="col-md-12">
                     <div class="mb-5 text-center">
                         <h1 class="text-white font-weight-bold">Discover Exciting work Opportunities</h1>
                         <p>Ready to make a difference? Shaghenli is your gateway to a real career. Explore a
                             wide range of work opportunities that match your interests and skills. Join our community
                             and start your journey towards making a great career."</p>
                     </div>
                     <form method="post" action="{{ route('search.job') }}" class="search-jobs-form">
                         @csrf
                         <div class="row mb-5">
                             <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                                 <input name="title" type="text" class="form-control form-control-lg"
                                     placeholder="title">
                             </div>
                             <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                                 <select name="location" class="selectpicker" data-style="btn-white btn-lg"
                                     data-width="100%" data-live-search="true" title="Select Region">
                                     <option>Downtown</option>
                                     <option>Aqaba Container Terminal</option>
                                     <option>Red Sea Dive Center</option>
                                     <option>Ayla Oasis</option>
                                     <option>Seabreeze for Marine Trips and Sports</option>
                                     <option>Saraya</option>
                                 </select>
                             </div>
                             <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                                 <select name="category" class="selectpicker" data-style="btn-white btn-lg"
                                     data-width="100%" data-live-search="true" title="Select Job Type">
                                     @foreach ($categories as $category)
                                         <option>{{ $category }}</option>
                                     @endforeach
                                 </select>
                             </div>
                             <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                                 <button name="submit" type="submit"
                                     class="btn btn-primary btn-lg btn-block text-white btn-search"><span
                                         class="icon-search icon mr-2"></span>Search Job</button>
                             </div>
                         </div>
                         <div class="row">
                         </div>
                     </form>
                 </div>
             </div>
         </div>

         <a href="#next" class="scroll-button smoothscroll">
             <span class=" icon-keyboard_arrow_down"></span>
         </a>

     </section>

     <section class="py-5 bg-image overlay-primary fixed overlay" id="next" style="background-image: url('images/hero_1.jpg'); background-color: blue !important;">

         <div class="container">
             <div class="row mb-5 justify-content-center">
                 <div class="col-md-7 text-center">
                     <h2 class="section-title mb-2 text-white">Our Impact in Numbers</h2>
                     <p class="lead text-white">We measure our success by the positive impact we create. Explore our
                         achievements and the numbers that reflect our commitment to making a difference.</p>
                 </div>
             </div>
             <div class="row pb-0 block__19738 section-counter">

                 <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
                     <div class="d-flex align-items-center justify-content-center mb-2">
                         <strong class="number" data-number="{{ $candidates }}">0</strong>
                     </div>
                     <span class="caption">Candidates</span>
                 </div>

                 <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
                     <div class="d-flex align-items-center justify-content-center mb-2">
                         <strong class="number" data-number="{{ $tasks }}">0</strong>
                     </div>
                     <span class="caption">working opportunities Posted</span>
                 </div>

                 <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
                     <div class="d-flex align-items-center justify-content-center mb-2">
                         <strong class="number" data-number="{{ $appFilled }}">0</strong>
                     </div>
                     <span class="caption">working opportunities Filled</span>
                 </div>

                 <div  class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
                     <div class="d-flex align-items-center justify-content-center mb-2">
                         <strong class="number" data-number="{{ $tasks > 4 ? $tasks - 3 : $tasks - 1 }}">0</strong>
                     </div>
                     <span class="caption">Events Done</span>
                 </div>


             </div>
         </div>
     </section>



     <section class="site-section">
         <div class="container">
             <div class="row mb-5 justify-content-center">
                 <div class="col-md-7 text-center">
                     <h2 class="section-title mb-2">Most Recent Opportunities</h2>
                 </div>
             </div>
             <ul class="job-listings mb-5">
                 @foreach ($jobs as $job)
                     <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                         <a href="{{ route('single.job', $job->id) }}"></a>
                         <div class="job-listing-logo">
                             <img src="{{ $job->image }}" alt="Free Website Template by Free-Template.co"
                                 class="img-fluid">
                         </div>

                         <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                             <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                                 <h2>{{ $job->title }}</h2>
                                 <strong>{{ $job->category->name }}</strong>
                             </div>
                             <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                                 <span class="icon-room"></span> {{ $job->location }}
                             </div>
                             <div class="job-listing-meta">
                                 <span class="badge badge-success"> {{ $job->vacancy }}</span>
                             </div>
                         </div>

                     </li>
                 @endforeach

             </ul>
             <div class="text-center">
                 <a href="{{ route('categories') }}" class="btn btn-primary btn-lg text-white">Show More</a>
             </div>
         </div>
     </section>

     <section class="py-5 bg-image overlay-primary fixed overlay" style="background-image: url('images/hero_1.jpg');">
         <div class="container">
             <div class="row align-items-center">
                 <div class="col-md-8">
                     <h2 class="text-white">Ready to Job?</h2>
                     <p class="mb-0 text-white lead">Join our platform and start your journey. Connect with
                         organizations and companies seeking dedicated workers. Sign up today and begin your rewarding
                         work experience.</p>
                 </div>
                 <div class="col-md-3 ml-auto">
                     @auth

                         <a href="{{ route('categories') }}" class="btn btn-warning btn-block btn-lg">Explore
                             Opportunities</a>
                     @else
                         <a href="{{ route('login') }}" class="btn btn-warning btn-block btn-lg">Sign Up</a>

                     @endauth
                 </div>
             </div>
         </div>
     </section>


     <section class="site-section py-4">
         <div class="container">

             <div class="row align-items-center">
                 <div class="col-12 text-center mt-4 mb-5">
                     <div class="row justify-content-center">
                         <div class="col-md-11">
                             <h2 class="section-title mb-2">Our Valued Partners</h2>
                             <p class="lead">At Shaghenli, we take immense pride in our collaborative efforts with a diverse array of valued partners who share our commitment to creating positive change in communities. Our partners, ranging from non-profit organizations to businesses and community initiatives, trust us to connect them with dedicated and passionate workers through our job portal. By understanding the unique needs and missions of our partners, we strive to match them with individuals eager to contribute their skills and time towards meaningful causes. Together, we foster a dynamic network where opportunities align seamlessly with the aspirations of both workers and organizations, fostering a collective impact that goes beyond traditional employment. Join us in building a community-driven workforce that makes a lasting difference in the world.
                             </p>
                         </div>
                     </div>

                 </div>

                 <div class="col-6 col-lg-3 col-md-6 text-center">
                     <img src="{{ asset('assets/images/1.png') }}" alt="Image" class="img-fluid logo-1" style="width: 200px" style="height: 200px">
                 </div>
                 <div class="col-6 col-lg-3 col-md-6 text-center">
                     <img src="{{ asset('assets/images/2.jpg') }}" alt="Image" class="img-fluid logo-2" style="width: 200px" style="height: 200px">
                 </div>
                 <div class="col-6 col-lg-3 col-md-6 text-center">
                     <img src="{{ asset('assets/images/3.jpg') }}" alt="Image" class="img-fluid logo-3" style="width: 200px" style="height: 200px">
                 </div>
                 <div class="col-6 col-lg-3 col-md-6 text-center">
                     <img src="{{ asset('assets/images/4.jpg') }}" alt="Image" class="img-fluid logo-4" style="width: 200px" style="height: 200px">
                 </div>

                 <div class="col-6 col-lg-3 col-md-6 text-center">
                     <img src="{{ asset('assets/images/5.jpg') }}" alt="Image" class="img-fluid logo-5" style="width: 200px" style="height: 200px">
                 </div>
                 <div class="col-6 col-lg-3 col-md-6 text-center">
                     <img src="{{ asset('assets/images/job_logo_3.jpg') }}" alt="Image" class="img-fluid logo-6" style="width: 200px" style="height: 200px">
                 </div>
                 <div class="col-6 col-lg-3 col-md-6 text-center">
                     <img src="{{ asset('assets/images/7.jpg') }}" alt="Image" class="img-fluid logo-7" style="width: 200px" style="height: 200px">
                 </div>
                 <div class="col-6 col-lg-3 col-md-6 text-center">
                     <img src="{{ asset('assets/images/job_logo_4.jpg') }}" alt="Image" class="img-fluid logo-8" style="width: 200px" style="height: 200px">
                 </div>
             </div>

         </div>
     </section>


     <section class="bg-light pt-5 testimony-full">

         <div class="row justify-content-center m-5">
             <div class="col-md-7">
                 <h2 class="section-title mb-2 text-center">Our Dedicated workers</h2>
                 <p class="lead">Meet some of our dedicated workers who have made a positive impact
                     through their work. These individuals found meaningful opportunities through
                     Shaghenli, and their stories inspire us all.</p>
             </div>
         </div>

         <div class="owl-carousel single-carousel">

             <div class="container">
                 <div class="row">
                     <div class="col-lg-6 align-self-center text-center text-lg-left">
                         <blockquote>
                             <p>Mohammed's journey with Shaghenli epitomizes the platform's ability to connect passionate individuals with meaningful opportunities. Through Shaghenli, he not only found a job but also discovered a pathway to make a positive impact in the Aqaba community. His story is a testament to the platform's effectiveness in empowering workers to contribute meaningfully to their communities, creating a ripple effect of inspiration for others.</p>
                             <p><cite> &mdash; Shaghelni Admins</cite></p>
                         </blockquote>
                     </div>
                     <div class="col-lg-6 align-self-end text-center text-lg-right">
                         <img src="{{ asset('assets/images/person_transparent.png') }}" alt="Image"
                             class="img-fluid mb-0">
                     </div>
                 </div>
             </div>

             <div class="container">
                 <div class="row">
                     <div class="col-lg-6 align-self-center text-center text-lg-left">
                         <blockquote>
                             <p>Yazeed's commitment to making a meaningful impact in the heart of Aqaba is a shining example of Shaghenli's transformative power in connecting dedicated workers with diverse job opportunities. From mentoring to organizing community events, Yazeed's journey showcases how Shaghenli serves as a catalyst for positive change. His unwavering dedication inspires others to leverage their skills for the betterment of Aqaba's vibrant communities.</p>
                             <p><cite> &mdash; Shaghelni Admins</cite></p>
                         </blockquote>
                     </div>
                     <div class="col-lg-6 align-self-end text-center text-lg-right">
                         <img src="{{ asset('assets/images/person_transparent_2.png') }}" alt="Image"
                             class="img-fluid mb-0" >
                     </div>
                 </div>
             </div>

         </div>

     </section>
 @endsection
