@extends('home::layouts.master')
@include('home::layouts.include.header')

<div id="scrollSmoother-container">
    <!-- ==================== Breadcrumb Start Here ==================== -->
<section class="breadcrumb-area background-img position-relative z-1" data-background-image="{{asset('assets/images/thumbs/breadcrumb-bg.jpg')}}">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="text-center">
                    <span class="breadcrumb-subtitle tw-mb-4 text-white text-uppercase tw-text-xl fw-bold text-white"> Experience the Story</span>
                    <h2 class="breadcrumb-title tw-text-25 fw-normal text-white tw-char-animation"> Offers</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ==================== Breadcrumb End Here ==================== -->

    <div class="pb-120">
        <div class="checkout-area position-relative z-3 tw_fade_anim" data-delay=".3">
     <div class="container">
          <div class="checkout-bg bg-white tw-pt-11 tw-px-14 tw-pb-11 tw-rounded-md">
               <div class="row">
                    <div class="col-xl-12">
                         <div class="checkout-main-wrapper">
                              <div class="checkout-wrapper d-flex flex-column">
                                   <label class="tw-text-sm fw-normal font-body d-flex align-content-center tw-gap-4 tw-mb-2"><span><img src="{{asset('assets/images/icons/checkout-icon1.svg')}}" alt="icon"></span> select date</label>
                                   <div class="nice-select"><span class="current">Check In</span>
                                       <ul class="list">
                                           <li class="option">Check In</li>
                                       </ul>
                                   </div>
                              </div>
                              <div class="checkout-wrapper d-flex flex-column">
                                   <label class="tw-text-sm fw-normal font-body d-flex align-content-center tw-gap-4 tw-mb-2"><span><img src="{{asset('assets/images/icons/checkout-icon1.svg')}}" alt="icon"></span> select date</label>
                                   <div class="nice-select"><span class="current">Check Out</span>
                                       <ul class="list">
                                           <li class="option">Check Out</li>
                                       </ul>
                                   </div>
                              </div>
                              <div class="checkout-wrapper d-flex flex-column">
                                   <label class="tw-text-sm fw-normal font-body d-flex align-content-center tw-gap-4 tw-mb-2"><span><img src="{{asset('assets/images/icons/checkout-icon3.svg')}}" alt="icon"></span> Select room</label>
                                   <div class="nice-select"><span class="current">Rooms</span>
                                       <ul class="list">
                                           <li class="option">Rooms</li>
                                           <li class="option">01</li>
                                           <li class="option">02</li>
                                           <li class="option">03</li>
                                           <li class="option">04</li>
                                           <li class="option">05</li>
                                           <li class="option">06</li>
                                           <li class="option">07</li>
                                           <li class="option">08</li>
                                           <li class="option">09</li>
                                       </ul>
                                   </div>
                              </div>
                              <div class="checkout-wrapper d-flex flex-column">
                                   <label class="tw-text-sm fw-normal font-body d-flex align-content-center tw-gap-4 tw-mb-2"><span><img src="{{asset('assets/images/icons/checkout-icon4.svg')}}" alt="icon"></span> 1 room, 1 adult, 0 child</label>
                                   <div class="nice-select"><span class="current">guests</span>
                                       <ul class="list">
                                           <li class="option">guests</li>
                                           <li class="option">1</li>
                                           <li class="option">2</li>
                                           <li class="option">3</li>
                                           <li class="option">4</li>
                                           <li class="option">5</li>
                                           <li class="option">6</li>
                                       </ul>
                                   </div>
                              </div>
                              <div class="checkout-wrapper">
                                   <div class="checkout-button common-hover-yellow">
                                        <button class="tw-btn-hover-black bg-main-600 tw-py-5 tw-px-7 text-uppercase text-heading font-heading d-inline-flex align-items-center tw-gap-2 tw-rounded-lg">EXPLORE MORE <span class="d-inline-block lh-1 tw-text-lg"><i class="ph ph-arrow-up-right"></i></span></button>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>
    </div>
    <section class="experience-area pb-120">
        <div class="container">
            <div class="row">
                <div class="col-xl-8">
                    <div class="section-two-wrapper tw-mb-14 tw_fade_anim">
                        <h6 class="section-two-subtitle tw-text-xl text-uppercase text-neutral-800 tw-mb-6">A Royal Taste of Elegance  </h6>
                        <h2 class="section-two-title tw-text-16 fw-normal tw-char-animation">Exquisite Dinner Experience Delight Your Taste Buds</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="experience-wrapper tw-mb-7 tw_fade_anim" data-delay=".3">
                        <div class="experience-thumb position-relative z-1">
                            <a href="destination-details.html"><img class="tw-rounded-lg" src="{{asset('assets/images/thumbs/experience-thumb1.jpg')}}" alt="thumb"></a>
                            <div class="position-absolute start-0 bottom-0 tw-ms-3 tw-mb-3">
                                <div class="experience-content d-flex justify-content-between align-items-end tw-rounded-lg">
                                    <div class="experience-content-inner">
                                        <h4 class="tw-text-2xl fw-normal tw-mb-2"><a href="destination-details.html">Sizzling The View</a></h4>
                                        <p class="d-inline-flex align-items-center tw-gap-2"><span class="d-inline-block lh-1 tw-text-2xl"><i class="ph ph-clock"></i></span> 6 PM – 11 PM</p>
                                    </div>
                                    <div>
                                        <a class="text-heading d-inline-flex align-items-center tw-gap-4" href="destination-details.html">Booking today <span class="tw-text-xl d-inline-block lh-1"><i class="ph ph-arrow-up-right"></i></span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="experience-tag position-absolute start-0 top-0 tw-mt-4 tw-ms-3">
                                <a class="bg-white d-inline-block text-heading tw-rounded-3xl tw-py-2 tw-px-5 text-capitalize fw-medium" href="destination-details.html">rooftop dinner</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="experience-wrapper tw-mb-7 tw_fade_anim" data-delay=".5">
                        <div class="experience-thumb position-relative z-1">
                            <a href="destination-details.html"><img class="tw-rounded-lg" src="{{asset('assets/images/thumbs/experience-thumb2.jpg')}}" alt="thumb"></a>
                            <div class="position-absolute start-0 bottom-0 tw-ms-3 tw-mb-3">
                                <div class="experience-content d-flex justify-content-between align-items-end tw-rounded-lg">
                                    <div class="experience-content-inner">
                                        <h4 class="tw-text-2xl fw-normal tw-mb-2"><a href="destination-details.html">Sizzling The View</a></h4>
                                        <p class="d-inline-flex align-items-center tw-gap-2"><span class="d-inline-block lh-1 tw-text-2xl"><i class="ph ph-clock"></i></span> 6 PM – 11 PM</p>
                                    </div>
                                    <div>
                                        <a class="text-heading d-inline-flex align-items-center tw-gap-4" href="destination-details.html">Booking today <span class="tw-text-xl d-inline-block lh-1"><i class="ph ph-arrow-up-right"></i></span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="experience-tag position-absolute start-0 top-0 tw-mt-4 tw-ms-3">
                                <a class="bg-white d-inline-block text-heading tw-rounded-3xl tw-py-2 tw-px-5 text-capitalize fw-medium" href="destination-details.html">rooftop dinner</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="experience-wrapper tw-mb-7 tw_fade_anim" data-delay=".7">
                        <div class="experience-thumb position-relative z-1">
                            <a href="destination-details.html"><img class="tw-rounded-lg" src="{{asset('assets/images/thumbs/experience-thumb3.jpg')}}" alt="thumb"></a>
                            <div class="position-absolute start-0 bottom-0 tw-ms-3 tw-mb-3">
                                <div class="experience-content d-flex justify-content-between align-items-end tw-rounded-lg">
                                    <div class="experience-content-inner">
                                        <h4 class="tw-text-2xl fw-normal tw-mb-2"><a href="destination-details.html">Sizzling The View</a></h4>
                                        <p class="d-inline-flex align-items-center tw-gap-2"><span class="d-inline-block lh-1 tw-text-2xl"><i class="ph ph-clock"></i></span> 6 PM – 11 PM</p>
                                    </div>
                                    <div>
                                        <a class="text-heading d-inline-flex align-items-center tw-gap-4" href="destination-details.html">Booking today <span class="tw-text-xl d-inline-block lh-1"><i class="ph ph-arrow-up-right"></i></span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="experience-tag position-absolute start-0 top-0 tw-mt-4 tw-ms-3">
                                <a class="bg-white d-inline-block text-heading tw-rounded-3xl tw-py-2 tw-px-5 text-capitalize fw-medium" href="destination-details.html">rooftop dinner</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="experience-wrapper tw-mb-7">
                        <div class="experience-thumb position-relative z-1 tw_fade_anim" data-delay=".3">
                            <a href="destination-details.html"><img class="tw-rounded-lg" src="{{asset('assets/images/thumbs/experience-thumb1.jpg')}}" alt="thumb"></a>
                            <div class="position-absolute start-0 bottom-0 tw-ms-3 tw-mb-3">
                                <div class="experience-content d-flex justify-content-between align-items-end tw-rounded-lg">
                                    <div class="experience-content-inner">
                                        <h4 class="tw-text-2xl fw-normal tw-mb-2"><a href="destination-details.html">Sizzling The View</a></h4>
                                        <p class="d-inline-flex align-items-center tw-gap-2"><span class="d-inline-block lh-1 tw-text-2xl"><i class="ph ph-clock"></i></span> 6 PM – 11 PM</p>
                                    </div>
                                    <div>
                                        <a class="text-heading d-inline-flex align-items-center tw-gap-4" href="destination-details.html">Booking today <span class="tw-text-xl d-inline-block lh-1"><i class="ph ph-arrow-up-right"></i></span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="experience-tag position-absolute start-0 top-0 tw-mt-4 tw-ms-3">
                                <a class="bg-white d-inline-block text-heading tw-rounded-3xl tw-py-2 tw-px-5 text-capitalize fw-medium" href="destination-details.html">rooftop dinner</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="experience-wrapper tw-mb-7 tw_fade_anim" data-delay=".5">
                        <div class="experience-thumb position-relative z-1">
                            <a href="destination-details.html"><img class="tw-rounded-lg" src="{{asset('assets/images/thumbs/experience-thumb2.jpg')}}" alt="thumb"></a>
                            <div class="position-absolute start-0 bottom-0 tw-ms-3 tw-mb-3">
                                <div class="experience-content d-flex justify-content-between align-items-end tw-rounded-lg">
                                    <div class="experience-content-inner">
                                        <h4 class="tw-text-2xl fw-normal tw-mb-2"><a href="destination-details.html">Sizzling The View</a></h4>
                                        <p class="d-inline-flex align-items-center tw-gap-2"><span class="d-inline-block lh-1 tw-text-2xl"><i class="ph ph-clock"></i></span> 6 PM – 11 PM</p>
                                    </div>
                                    <div>
                                        <a class="text-heading d-inline-flex align-items-center tw-gap-4" href="destination-details.html">Booking today <span class="tw-text-xl d-inline-block lh-1"><i class="ph ph-arrow-up-right"></i></span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="experience-tag position-absolute start-0 top-0 tw-mt-4 tw-ms-3">
                                <a class="bg-white d-inline-block text-heading tw-rounded-3xl tw-py-2 tw-px-5 text-capitalize fw-medium" href="destination-details.html">rooftop dinner</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="experience-wrapper tw-mb-7 tw_fade_anim" data-delay=".7">
                        <div class="experience-thumb position-relative z-1">
                            <a href="destination-details.html"><img class="tw-rounded-lg" src="{{asset('assets/images/thumbs/experience-thumb3.jpg')}}" alt="thumb"></a>
                            <div class="position-absolute start-0 bottom-0 tw-ms-3 tw-mb-3">
                                <div class="experience-content d-flex justify-content-between align-items-end tw-rounded-lg">
                                    <div class="experience-content-inner">
                                        <h4 class="tw-text-2xl fw-normal tw-mb-2"><a href="destination-details.html">Sizzling The View</a></h4>
                                        <p class="d-inline-flex align-items-center tw-gap-2"><span class="d-inline-block lh-1 tw-text-2xl"><i class="ph ph-clock"></i></span> 6 PM – 11 PM</p>
                                    </div>
                                    <div>
                                        <a class="text-heading d-inline-flex align-items-center tw-gap-4" href="destination-details.html">Booking today <span class="tw-text-xl d-inline-block lh-1"><i class="ph ph-arrow-up-right"></i></span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="experience-tag position-absolute start-0 top-0 tw-mt-4 tw-ms-3">
                                <a class="bg-white d-inline-block text-heading tw-rounded-3xl tw-py-2 tw-px-5 text-capitalize fw-medium" href="destination-details.html">rooftop dinner</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="overflow-hidden position-relative z-2" style="background: #f7f7ee;">
   <div class="marquee">
      <div class="d-inline-flex align-items-center tw-gap-14 tw-pb-25">
         <div class="marquee-icon">
            <span><img src="assets/images/icons/marquee-three-icon.svg" alt="marquee"></span>
         </div>
         <div>
            <h2 class="marquee-title text-black fw-normal">Luxary hotel & resport</h2>
         </div>
      </div>
      <div class="d-inline-flex align-items-center tw-gap-14 tw-pb-25">
         <div class="marquee-icon">
            <span><img src="{{asset('assets/images/icons/marquee-three-icon.svg')}}" alt="marquee"></span>
         </div>
         <div>
            <h2 class="marquee-title text-black fw-normal">Luxary hotel & resport</h2>
         </div>
      </div>
   </div>
   <div class="marquee-three-2-bg">
      <img src="{{asset('assets/images/thumbs/marquee-three-2-bg.jpg')}}" alt="bg">
   </div>
</div>

@include('home::layouts.include.footer')
