 @extends('layouts.app')

 @section('content')
     <!-- HOME -->
     <section class="mt-n4 section-hero overlay inner-page bg-image"
         style="margin-top:-24px; background-image: url({{ asset('assets/images/home-bg.jpg') }});" id="home-section">
         <div class="container">
             <div class="row">
                 <div class="col-md-7">
                     <h1 class="text-white font-weight-bold">Privacy Policy</h1>
                     <div class="custom-breadcrumbs">
                         <a href="#">Home</a> <span class="mx-2 slash">/</span>
                         <span class="text-white"><strong>Privacy Policy</strong></span>
                     </div>
                 </div>
             </div>
         </div>
     </section>


     <div class="container m-5">
         <div class="card p-5">
             <h2 class="card-header">Privacy Policy</h2>
             <div class="card-body">
                 <p>At Shaghenli, we take your privacy seriously and are committed to protecting your personal information.
                     This
                     Privacy Policy is designed to help you understand how we collect, use, disclose, and safeguard your
                     personal
                     information. By using our platform and services, you consent to the practices described in this Privacy
                     Policy.
                 </p>

                 <h3 class="mt-4">1. Information We Collect</h3>
                 <p>We collect various types of information to provide and improve our services to you. The types of
                     information
                     we
                     collect include:</p>
                 <ul>
                     <li><strong>Personal Information:</strong> When you sign up as a Job or non-profit organization,
                         we
                         may
                         collect personal information such as your name, email address, phone number, and location.</li>
                     <li><strong>Job Preferences:</strong> We collect information about your work preferences and
                         interests to match you with suitable work opportunities.</li>
                     <li><strong>Non-profit Organization Information:</strong> For non-profit organizations looking for
                         Jobs,
                         we collect information about your organization, mission, and Job needs.</li>
                     <li><strong>Usage Data:</strong> We collect data on how you interact with our platform, including your
                         browsing
                         activity and the pages you visit.</li>
                 </ul>

                 <h3 class="mt-4">2. How We Use Your Information</h3>
                 <p>We use your information to:</p>
                 <ul>
                     <li><strong>Match Jobs and Non-profit Organizations:</strong> We use your preferences to connect
                         Jobs with non-profit organizations seeking assistance.</li>
                     <li><strong>Communicate:</strong> We use your contact information to send you important updates,
                         newsletters,
                         and information about Job opportunities.</li>
                     <li><strong>Improve Our Services:</strong> We analyze usage data to enhance our platform, making it
                         easier
                         for
                         Jobs and organizations to connect.</li>
                 </ul>

                 <h3 class="mt-4">3. Data Security</h3>
                 <p>We take data security seriously and implement security measures to protect your information. However,
                     please
                     be
                     aware that no method of transmission over the internet or electronic storage is completely secure.</p>

                 <h3 class="mt-4">4. Your Choices</h3>
                 <p>You have the right to access, correct, or delete your personal information. You can also opt-out of
                     receiving
                     communications from us.</p>

                 <h3 class="mt-4">5. Changes to this Privacy Policy</h3>
                 <p>We may update this Privacy Policy from time to time. Please review it periodically to stay informed
                     about
                     how we
                     are protecting your information.</p>

                 <h3 class="mt-4">6. Contact Us</h3>
                 <p>If you have any questions or concerns about our Privacy Policy, please contact us at <a
                         href="mailto:anasyasien101@gmail.com">support@cityserve.com</a>.</p>

                 <p>By using our platform, you agree to the terms of this Privacy Policy.</p>

                 <p class="text-muted">Last Updated: [10/09/2023]</p>
             </div>
         </div>
     </div>


     {{-- <div class="container mt-5">
         <h1 class="mb-4">Privacy Policy</h1>
         <p>At Shaghenli, we take your privacy seriously and are committed to protecting your personal information. This
             Privacy Policy is designed to help you understand how we collect, use, disclose, and safeguard your personal
             information. By using our platform and services, you consent to the practices described in this Privacy Policy.
         </p>

         <h3 class="mt-4">1. Information We Collect</h3>
         <p>We collect various types of information to provide and improve our services to you. The types of information we
             collect include:</p>
         <ul>
             <li><strong>Personal Information:</strong> When you sign up as a Job or non-profit organization, we may
                 collect personal information such as your name, email address, phone number, and location.</li>
             <li><strong>Job Preferences:</strong> We collect information about your Job preferences and
                 interests to match you with suitable Job opportunities.</li>
             <li><strong>Non-profit Organization Information:</strong> For non-profit organizations looking for Jobs,
                 we collect information about your organization, mission, and Job needs.</li>
             <li><strong>Usage Data:</strong> We collect data on how you interact with our platform, including your browsing
                 activity and the pages you visit.</li>
         </ul>

         <h3 class="mt-4">2. How We Use Your Information</h3>
         <p>We use your information to:</p>
         <ul>
             <li><strong>Match Jobs and Non-profit Organizations:</strong> We use your preferences to connect
                 Jobs with non-profit organizations seeking assistance.</li>
             <li><strong>Communicate:</strong> We use your contact information to send you important updates, newsletters,
                 and information about Job opportunities.</li>
             <li><strong>Improve Our Services:</strong> We analyze usage data to enhance our platform, making it easier for
                 Jobs and organizations to connect.</li>
         </ul>

         <h3 class="mt-4">3. Data Security</h3>
         <p>We take data security seriously and implement security measures to protect your information. However, please be
             aware that no method of transmission over the internet or electronic storage is completely secure.</p>

         <h3 class="mt-4">4. Your Choices</h3>
         <p>You have the right to access, correct, or delete your personal information. You can also opt-out of receiving
             communications from us.</p>

         <h3 class="mt-4">5. Changes to this Privacy Policy</h3>
         <p>We may update this Privacy Policy from time to time. Please review it periodically to stay informed about how we
             are protecting your information.</p>

         <h3 class="mt-4">6. Contact Us</h3>
         <p>If you have any questions or concerns about our Privacy Policy, please contact us at <a
                 href="mailto:contact@email.com">support@cityserve.com</a>.</p>

         <p>By using our platform, you agree to the terms of this Privacy Policy.</p>

         <p class="text-muted">Last Updated: [10/09/2023]</p>
     </div> --}}
 @endsection
