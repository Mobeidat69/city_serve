 @extends('layouts.app')

 @section('content')
     <!-- HOME -->
     <section class="mt-n4 section-hero overlay inner-page bg-image"
         style="margin-top:-24px; background-image: url({{ asset('assets/images/home-bg.jpg') }});" id="home-section">
         <div class="container">
             <div class="row">
                 <div class="col-md-7">
                     <h1 class="text-white font-weight-bold">Terms of Service</h1>
                     <div class="custom-breadcrumbs">
                         <a href="#">Home</a> <span class="mx-2 slash">/</span>
                         <span class="text-white"><strong>Terms of Service</strong></span>
                     </div>
                 </div>
             </div>
         </div>
     </section>




     <div class="container mt-5">
         <h1 class="mb-4">Terms of Service</h1>
         <p>Welcome to Shaghenli! These Terms of Service outline the rules and regulations for using our platform. By
             accessing this website, we assume you accept these terms and conditions. Do not continue to use Shaghenli if
             you do not agree to take all of the terms and conditions stated on this page.</p>

         <h3 class="mt-4">1. License to Use</h3>
         <p>Shaghenli and its licensors own the intellectual property rights for all material on Shaghenli. You are
             granted a limited license only for purposes of viewing the material contained on this website.</p>

         <h3 class="mt-4">2. Restrictions</h3>
         <p>You are specifically restricted from the following:</p>
         <ul>
             <li>Publishing any website material in any other media.</li>
             <li>Selling, sublicensing, and/or otherwise commercializing any website material.</li>
             <li>Publicly performing and/or showing any website material without proper attribution.</li>
             <li>Using this website in any way that is, or may be, damaging to this website.</li>
             <li>Using this website in any way that impacts user access to this website.</li>
         </ul>

         <h3 class="mt-4">3. Disclaimer</h3>
         <p>This website is provided "as is," with all faults, and Shaghenli makes no express or implied representations or
             warranties, of any kind related to this website or the materials contained on this website. Additionally,
             nothing contained on this website shall be interpreted as advising you.</p>

         <h3 class="mt-4">4. Limitation of Liability</h3>
         <p>In no event shall Shaghenli, nor any of its officers, directors, and employees, be held liable for anything
             arising out of or in any way connected with your use of this website, whether such liability is under contract.
             Shaghenli, including its officers, directors, and employees, shall not be held liable for any indirect,
             consequential, or special liability arising out of or in any way related to your use of this website.</p>

         <h3 class="mt-4">5. Severability</h3>
         <p>If any provision of these Terms of Service is found to be invalid under any applicable law, such provisions
             shall be deleted without affecting the remaining provisions herein.</p>

         <p>If you have any questions or concerns about our Terms of Service, please contact us at <a
                 href="mailto:anasyasien101@gmail.com">support@cityserve.com</a>.</p>

         <p class="text-muted">Last Updated: [10/09/2023]</p>
     </div>

     {{-- <div class="container m-5">
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
                     <li><strong>Job Preferences:</strong> We collect information about your Job preferences and
                         interests to match you with suitable Job opportunities.</li>
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
                         href="mailto:contact@email.com">support@cityserve.com</a>.</p>

                 <p>By using our platform, you agree to the terms of this Privacy Policy.</p>

                 <p class="text-muted">Last Updated: [10/09/2023]</p>
             </div>
         </div>
     </div> --}}
 @endsection
