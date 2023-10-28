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
                         <p>Ready to make a difference? Shaghenli is your gateway to meaningful work work. Explore a
                             wide range of work opportunities that match your interests and skills. Join our community
                             and start your journey towards making a positive impact."</p>
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
                                     <option>Amman</option>
                                     <option>Aqaba</option>
                                     <option>Maan</option>
                                     <option>Irbid</option>
                                     <option>Azzarqa</option>
                                     <option>Karak</option>
                                     <option>Ajloun</option>
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

                 <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
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
                     <p class="mb-0 text-white lead">Join our platform and start your journey as a Job. Connect with
                         non-profit organizations seeking dedicated workers. Sign up today and begin your rewarding
                         Job experience.</p>
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
                             <p class="lead">At Shaghenli, we take pride in our strong partnerships with non-profit
                                 organizations dedicated to making a positive impact in our communities. Together with our
                                 valued partners, we connect passionate workers with meaningful opportunities to support
                                 various causes and initiatives. Our collaboration with these organizations allows us to
                                 create a lasting difference in the lives of those in need. We believe that working hand in
                                 hand with our partners is the key to building a better, more compassionate world. Explore
                                 the incredible work of our partners and join us in our mission to make working
                                 accessible to all.
                             </p>
                         </div>
                     </div>

                 </div>

                 <div class="col-6 col-lg-3 col-md-6 text-center">
                     <img src="{{ asset('assets/images/9.jpg') }}" alt="Image" class="img-fluid logo-1">
                 </div>
                 <div class="col-6 col-lg-3 col-md-6 text-center">
                     <img src="{{ asset('assets/images/2.jpg') }}" alt="Image" class="img-fluid logo-2">
                 </div>
                 <div class="col-6 col-lg-3 col-md-6 text-center">
                     <img src="{{ asset('assets/images/3.jpg') }}" alt="Image" class="img-fluid logo-3">
                 </div>
                 <div class="col-6 col-lg-3 col-md-6 text-center">
                     <img src="{{ asset('assets/images/4.jpg') }}" alt="Image" class="img-fluid logo-4">
                 </div>

                 <div class="col-6 col-lg-3 col-md-6 text-center">
                     <img src="{{ asset('assets/images/5.jpg') }}" alt="Image" class="img-fluid logo-5">
                 </div>
                 <div class="col-6 col-lg-3 col-md-6 text-center">
                     <img src="{{ asset('assets/images/6.jpg') }}" alt="Image" class="img-fluid logo-6">
                 </div>
                 <div class="col-6 col-lg-3 col-md-6 text-center">
                     <img src="{{ asset('assets/images/10.jpg') }}" alt="Image" class="img-fluid logo-7">
                 </div>
                 <div class="col-6 col-lg-3 col-md-6 text-center">
                     <img src="{{ asset('assets/images/8.jpg') }}" alt="Image" class="img-fluid logo-8">
                 </div>
             </div>

         </div>
     </section>


     <section class="bg-light pt-5 testimony-full">

         <div class="row justify-content-center m-5">
             <div class="col-md-7">
                 <h2 class="section-title mb-2 text-center">Our Dedicated workers</h2>
                 <p class="lead">Meet some of our dedicated workers who have made a positive impact
                     through their Job work. These individuals found meaningful opportunities through
                     Shaghenli, and their stories inspire us all.</p>
             </div>
         </div>

         <div class="owl-carousel single-carousel">

             <div class="container">
                 <div class="row">
                     <div class="col-lg-6 align-self-center text-center text-lg-left">
                         <blockquote>
                             <p>&ldquo;Meet Sameer, a dedicated Shaghenli worker, driven by his passion to create a positive impact in the Aqaba community through active involvement in local initiatives. His inspiring story serves as a beacon of hope, illuminating the path to positive change through Jobing with Shaghenli in our vibrant city.&rdquo;</p>
                             <p><cite> &mdash; Sameer, @WFP</cite></p>
                         </blockquote>
                     </div>
                     <div class="col-lg-6 align-self-end text-center text-lg-right">
                         <img src="{{ asset('assets/images/person_transparent_2.png') }}" alt="Image"
                             class="img-fluid mb-0">
                     </div>
                 </div>
             </div>

             <div class="container">
                 <div class="row">
                     <div class="col-lg-6 align-self-center text-center text-lg-left">
                         <blockquote>
                             <p>&ldquo;Meet Jameel, a dedicated Shaghenli work, who embarked on his journey with a strong desire to make a meaningful impact in the heart of Amman. He discovered a wide array of Job opportunities, from mentoring to organizing community events, all through Shaghenli. Jameel's unwavering commitment stands as a testament to the transformative power of working, igniting positive change within Amman's diverse communities..&rdquo;</p>
                             <p><cite> &mdash; Jameel, @WWF</cite></p>
                         </blockquote>
                     </div>
                     <div class="col-lg-6 align-self-end text-center text-lg-right">
                         <img src="{{ asset('assets/images/person_transparent.png') }}" alt="Image"
                             class="img-fluid mb-0">
                     </div>
                 </div>
             </div>

         </div>

     </section>
 @endsection
