@extends('layouts.app')

@section('content')
    <x-page-breadcrumb title="Contact" />

    <section class="tp-contact-area pb-100">
        <div class="container">
           <div class="tp-contact-inner">
              <div class="row">
                 <div class="col-xl-9 col-lg-8">
                    <div class="tp-contact-wrapper">
                       <h3 class="tp-contact-title">Sent A Message</h3>

                       <div class="tp-contact-form">
                          <form id="contact-form" action="https://html.hixstudio.net/shofy-prv/shofy/assets/mail.php" method="POST">
                             <div class="tp-contact-input-wrapper">
                                <div class="tp-contact-input-box">
                                   <div class="tp-contact-input">
                                      <input name="name" id="name" type="text" placeholder="Shahnewaz Sakil" required>
                                   </div>
                                   <div class="tp-contact-input-title">
                                      <label for="name">Your Name</label>
                                   </div>
                                </div>
                                <div class="tp-contact-input-box">
                                   <div class="tp-contact-input">
                                      <input name="email" id="email" type="email" placeholder="shofy@mail.com" required>
                                   </div>
                                   <div class="tp-contact-input-title">
                                      <label for="email">Your Email</label>
                                   </div>
                                </div>
                                <div class="tp-contact-input-box">
                                   <div class="tp-contact-input">
                                      <input name="subject" id="subject" type="text" placeholder="Write your subject" required>
                                   </div>
                                   <div class="tp-contact-input-title">
                                      <label for="subject">Subject</label>
                                   </div>
                                </div>
                                <div class="tp-contact-input-box">
                                   <div class="tp-contact-input">
                                     <textarea id="message" name="message" placeholder="Write your message here..." required></textarea>
                                   </div>
                                   <div class="tp-contact-input-title">
                                      <label for="message">Your Message</label>
                                   </div>
                                </div>
                             </div>
                             <div class="tp-contact-suggetions mb-20">
                                <div class="tp-contact-remeber">
                                   <input id="remeber" type="checkbox" required>
                                   <label for="remeber">Save my name, email, and website in this browser for the next time I comment.</label>
                                </div>
                             </div>
                             <div class="tp-contact-btn">
                                <button type="submit">Send Message</button>
                             </div>
                          </form>
                          <p class="ajax-response"></p>
                       </div>
                    </div>
                 </div>
                 <div class="col-xl-3 col-lg-4">
                    <div class="tp-contact-info-wrapper">
                       <div class="tp-contact-info-item">
                          <div class="tp-contact-info-icon">
                             <span>
                                <img src="assets/img/contact/contact-icon-1.png" alt="">
                             </span>
                          </div>
                          <div class="tp-contact-info-content">
                             <p data-info="mail"><a href="mailto:kontakdiperfects@gmail.com">kontakdiperfects@gmail.com</a></p>
                             <p data-info="phone"><a href="tel:+6282161416162">+62 821-6141-6162</a></p>
                          </div>
                       </div>
                       <div class="tp-contact-info-item">
                          <div class="tp-contact-info-icon">
                             <span>
                                <img src="{{asset('assets/img/contact/contact-icon-2.png')}}" alt="">
                             </span>
                          </div>
                          <div class="tp-contact-info-content">
                             <p>
                                <a href="https://www.google.com/maps/place/D'Perfect+Skin+Care/@-6.352201,106.5752241,21z/data=!4m6!3m5!1s0x2e69e3b34cf5a023:0xd2180ed9b054637d!8m2!3d-6.3521397!4d106.5753687!16s%2Fg%2F11t833_7fv?entry=ttu" target="_blank">
                                   Sentraland Paradise RC-19<br> Parung Panjang, Bogor 16360
                                </a>
                             </p>
                          </div>
                       </div>
                       <div class="tp-contact-info-item">
                          <div class="tp-contact-info-icon">
                             <span>
                                <img src="{{asset('assets/img/contact/contact-icon-3.png')}}" alt="">
                             </span>
                          </div>
                          <div class="tp-contact-info-content">
                             <div class="tp-contact-social-wrapper mt-5">
                                <h4 class="tp-contact-social-title">Find on social media</h4>

                                <div class="tp-contact-social-icon">
                                   <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                   <a href="#"><i class="fa-brands fa-twitter"></i></a>
                                   <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                                </div>
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </section>
     <!-- contact area end -->

     <!-- map area start -->
     <section class="tp-map-area pb-120">
        <div class="container">
           <div class="row">
              <div class="col-xl-12">
                 <div class="tp-map-wrapper">
                    <div class="tp-map-hotspot">
                       <span class="tp-hotspot tp-pulse-border">
                          <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                             <circle cx="6" cy="6" r="6" fill="#821F40"/>
                          </svg>
                       </span>
                    </div>
                    <div class="tp-map-iframe">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.3236086197026!2d106.57279377488872!3d-6.3521343621443!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69e3b34cf5a023%3A0xd2180ed9b054637d!2sD&#39;Perfect%20Skin%20Care!5e0!3m2!1sid!2sid!4v1699578813011!5m2!1sid!2sid" class="rounded"></iframe>
                       {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.15830894612!2d-74.11976383964465!3d40.69766374865766!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1678114595329!5m2!1sen!2sbd"></iframe> --}}
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </section>

@endsection
