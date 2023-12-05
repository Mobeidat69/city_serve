 @extends('layouts.app')

 @section('content')
     <!-- HOME -->
     <section class="mt-n4 section-hero overlay inner-page bg-image"
         style="margin-top:-24px; background-image: url({{ asset('assets/images/home-bg.jpg') }});" id="home-section">
         <div class="container">
             <div class="row">
                 <div class="col-md-7">
                     <h1 class="text-white font-weight-bold">Support</h1>
                     <div class="custom-breadcrumbs">
                         <a href="#">Home</a> <span class="mx-2 slash">/</span>
                         <span class="text-white"><strong>Support</strong></span>
                     </div>
                 </div>
             </div>
         </div>
     </section>


     <div class="container">
         <div class="row justify-content-center">
             <div class="col-md-8 m-5">

                 <form action="{{ route('home') }}" method="get" class="p-4 border rounded">
                     @csrf
                     <div class="row form-group">
                         <div class="col-md-12 mb-3 mb-md-0">
                             <label class="text-black" for="fname">Name</label>
                             <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                 name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                             @error('name')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                             @enderror
                         </div>
                     </div>
                     <div class="row form-group">
                         <div class="col-md-12 mb-3 mb-md-0">
                             <label class="text-black" for="email">Email</label>
                             <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                 name="email" value="{{ old('email') }}" required autocomplete="email">
                             @error('email')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                             @enderror
                         </div>
                     </div>
                     <div class="row form-group">
                         <div class="col-md-12 mb-3 mb-md-0">
                             <label class="text-black" for="password">Subject</label>
                             <input id="subject" type="text"
                                 class="form-control @error('subject') is-invalid @enderror" name="subject" required>
                             @error('subject')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                             @enderror
                         </div>
                     </div>
                     <div class="row form-group mb-4">
                         <div class="col-md-12 mb-3 mb-md-0">
                             <label class="text-black" for="message">Your Message</label>
                             <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>

                         </div>
                     </div>

                     <div class="row form-group">
                         <div class="col-md-12">
                             <input type="submit" name="submit" value="Send Message"
                                 class="btn px-4 btn-primary text-white">
                         </div>
                     </div>

                 </form>

             </div>
         </div>
     </div>
 @endsection
