@extends('layouts.app')

@section('title', 'Contact Us')

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
                          <form id="contact-form" action="#" method="POST">
                             <div class="tp-contact-input-wrapper">
                                <div class="tp-contact-input-box">
                                   <div class="tp-contact-input">
                                      <input name="name" id="name" type="text" required>
                                   </div>
                                   <div class="tp-contact-input-title">
                                      <label for="name">Your Name</label>
                                   </div>
                                </div>
                                <div class="tp-contact-input-box">
                                   <div class="tp-contact-input">
                                      <input name="email" id="email" type="email" required>
                                   </div>
                                   <div class="tp-contact-input-title">
                                      <label for="email">Your Email</label>
                                   </div>
                                </div>
                                <div class="tp-contact-input-box">
                                   <div class="tp-contact-input">
                                      <input name="subject" id="subject" type="text" required>
                                   </div>
                                   <div class="tp-contact-input-title">
                                      <label for="subject">Subject</label>
                                   </div>
                                </div>
                                <div class="tp-contact-input-box">
                                   <div class="tp-contact-input">
                                     <textarea id="message" name="message" required></textarea>
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
                                <img src="{{asset('img/contact/contact-icon-1.png')}}" alt="">
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
                                <img src="{{asset('img/contact/contact-icon-2.png')}}" alt="">
                             </span>
                          </div>
                          <div class="tp-contact-info-content">
                             <p>
                                <a href="https://maps.app.goo.gl/WGfmL6XsAqdQJ59y7" target="_blank">
                                   Sentraland Paradise RC-19<br> Parung Panjang, Bogor 16360
                                </a>
                             </p>
                          </div>
                       </div>
                       <div class="tp-contact-info-item">
                          <div class="tp-contact-info-icon">
                             <span>
                                <img src="{{asset('img/contact/contact-icon-3.png')}}" alt="">
                             </span>
                          </div>
                          <div class="tp-contact-info-content">
                             <div class="tp-contact-social-wrapper mt-5">
                                <h4 class="tp-contact-social-title">Find on social media</h4>

                                <div class="tp-contact-social-icon">
                                   <a href="https://www.instagram.com/diperfects_official/" target="__blank"><i class="fa-brands fa-instagram"></i></a>
                                   <a href="https://www.tiktok.com/@diperfects_official" target="__blank"><i class="fa-brands fa-tiktok"></i></a>
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
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1401.9539279113983!2d106.57573021201708!3d-6.352016411293867!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69e3b34cf5a023%3A0xd2180ed9b054637d!2sDI&#39;%20Perfects%20Beauty%20and%20Authentic%20Perfume!5e0!3m2!1sen!2sid!4v1699629836140!5m2!1sen!2sid" class="rounded"></iframe>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </section>

@endsection
