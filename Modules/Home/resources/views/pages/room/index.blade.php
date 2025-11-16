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
                    <h2 class="breadcrumb-title tw-text-25 fw-normal text-white tw-char-animation"> Room</h2>
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
    <section class="" style="background: #f7f6ed;">
        <div class="container service-two-container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-10">
                    <div class="section-two-wrapper text-center tw-mb-14 tw_fade_anim">
                        <h6 class="section-two-subtitle tw-text-xl text-uppercase text-neutral-800 tw-mb-6">Rest, Relax, Recharge</h6>
                        <h2 class="section-two-title tw-text-16 fw-normal tw-char-animation">Experience Luxury And Comfort With In Every Corners</h2>
                    </div>
                </div>
            </div>
            <div class="row tw-pb-14">
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="service-two-wrapper tw-mb-7 tw_fade_anim" data-delay=".3">
                        <div class="service-two-thumb position-relative z-1 tw-mb-7">
                            <a href="room-details.html"><img class="tw-rounded-lg" src="{{asset('assets/images/thumbs/service-two-thumb1.jpg')}}" alt="thumb"></a>
                            <div class="position-absolute start-0 bottom-0 tw-mb-5 tw-ms-4">
                                <ul class="d-flex tw-gap-2 flex-wrap row-gap-3">
                                    <li class="bg-white tw-rounded-3xl tw-py-2 tw-px-6 fw-medium text-heading">Luxury</li>
                                    <li class="bg-white tw-rounded-3xl tw-py-2 tw-px-6 fw-medium text-heading d-inline-flex tw-gap-2 align-items-center"><span class="d-inline-block lh-1"><img src="{{asset('assets/images/icons/service-two-icon1.svg')}}" alt=""></span> 900 Sqft</li>
                                    <li class="bg-white tw-rounded-3xl tw-py-2 tw-px-6 fw-medium text-heading d-inline-flex tw-gap-2 align-items-center"><span class="d-inline-block lh-1"><img src="{{asset('assets/images/icons/service-two-icon2.svg')}}" alt=""></span> 4 guest</li>
                                </ul>
                            </div>
                        </div>
                        <div class="service-two-content">
                            <h4 class="service-two-title tw-text-2xl fw-normal border-bottom border-neutral tw-pb-4"><a href="room-details.html">Presidential Suite</a></h4>
                            <span class="service-two-price font-heading tw-text-10 fw-normal text-heading">$599</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="service-two-wrapper tw-mb-7 tw_fade_anim" data-delay=".5">
                        <div class="service-two-thumb position-relative z-1 tw-mb-7">
                            <a href="room-details.html"><img class="tw-rounded-lg" src="{{asset('assets/images/thumbs/service-two-thumb2.jpg')}}" alt="thumb"></a>
                            <div class="position-absolute start-0 bottom-0 tw-mb-5 tw-ms-4">
                                <ul class="d-flex tw-gap-2 flex-wrap row-gap-3">
                                    <li class="bg-white tw-rounded-3xl tw-py-2 tw-px-6 fw-medium text-heading">Luxury</li>
                                    <li class="bg-white tw-rounded-3xl tw-py-2 tw-px-6 fw-medium text-heading d-inline-flex tw-gap-2 align-items-center"><span class="d-inline-block lh-1"><img src="{{asset('assets/images/icons/service-two-icon1.svg')}}" alt=""></span> 900 Sqft</li>
                                    <li class="bg-white tw-rounded-3xl tw-py-2 tw-px-6 fw-medium text-heading d-inline-flex tw-gap-2 align-items-center"><span class="d-inline-block lh-1"><img src="{{asset('assets/images/icons/service-two-icon2.svg')}}" alt=""></span> 4 guest</li>
                                </ul>
                            </div>
                        </div>
                        <div class="service-two-content">
                            <h4 class="service-two-title tw-text-2xl fw-normal border-bottom border-neutral tw-pb-4"><a href="room-details.html">Royal Deluxe Room</a></h4>
                            <span class="service-two-price font-heading tw-text-10 fw-normal text-heading">$599</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="service-two-wrapper tw-mb-7 tw_fade_anim" data-delay=".7">
                        <div class="service-two-thumb position-relative z-1 tw-mb-7">
                            <a href="room-details.html"><img class="tw-rounded-lg" src="{{asset('assets/images/thumbs/service-two-thumb3.jpg')}}" alt="thumb"></a>
                            <div class="position-absolute start-0 bottom-0 tw-mb-5 tw-ms-4">
                                <ul class="d-flex tw-gap-2 flex-wrap row-gap-3">
                                    <li class="bg-white tw-rounded-3xl tw-py-2 tw-px-6 fw-medium text-heading">Luxury</li>
                                    <li class="bg-white tw-rounded-3xl tw-py-2 tw-px-6 fw-medium text-heading d-inline-flex tw-gap-2 align-items-center"><span class="d-inline-block lh-1"><img src="{{asset('assets/images/icons/service-two-icon1.svg')}}" alt=""></span> 900 Sqft</li>
                                    <li class="bg-white tw-rounded-3xl tw-py-2 tw-px-6 fw-medium text-heading d-inline-flex tw-gap-2 align-items-center"><span class="d-inline-block lh-1"><img src="{{asset('assets/images/icons/service-two-icon2.svg')}}" alt=""></span> 4 guest</li>
                                </ul>
                            </div>
                        </div>
                        <div class="service-two-content">
                            <h4 class="service-two-title tw-text-2xl fw-normal border-bottom border-neutral tw-pb-4"><a href="room-details.html">Presidential Suite</a></h4>
                            <span class="service-two-price font-heading tw-text-10 fw-normal text-heading">$599</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="service-two-wrapper tw-mb-7 tw_fade_anim" data-delay=".3">
                        <div class="service-two-thumb position-relative z-1 tw-mb-7">
                            <a href="room-details.html"><img class="tw-rounded-lg" src="{{asset('assets/images/thumbs/service-two-thumb1.jpg')}}" alt="thumb"></a>
                            <div class="position-absolute start-0 bottom-0 tw-mb-5 tw-ms-4">
                                <ul class="d-flex tw-gap-2 flex-wrap row-gap-3">
                                    <li class="bg-white tw-rounded-3xl tw-py-2 tw-px-6 fw-medium text-heading">Luxury</li>
                                    <li class="bg-white tw-rounded-3xl tw-py-2 tw-px-6 fw-medium text-heading d-inline-flex tw-gap-2 align-items-center"><span class="d-inline-block lh-1"><img src="{{asset('assets/images/icons/service-two-icon1.svg')}}" alt=""></span> 900 Sqft</li>
                                    <li class="bg-white tw-rounded-3xl tw-py-2 tw-px-6 fw-medium text-heading d-inline-flex tw-gap-2 align-items-center"><span class="d-inline-block lh-1"><img src="{{asset('assets/images/icons/service-two-icon2.svg')}}" alt=""></span> 4 guest</li>
                                </ul>
                            </div>
                        </div>
                        <div class="service-two-content">
                            <h4 class="service-two-title tw-text-2xl fw-normal border-bottom border-neutral tw-pb-4"><a href="room-details.html">Presidential Suite</a></h4>
                            <span class="service-two-price font-heading tw-text-10 fw-normal text-heading">$599</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="service-two-wrapper tw-mb-7 tw_fade_anim" data-delay=".5">
                        <div class="service-two-thumb position-relative z-1 tw-mb-7">
                            <a href="room-details.html"><img class="tw-rounded-lg" src="{{asset('assets/images/thumbs/service-two-thumb2.jpg')}}" alt="thumb"></a>
                            <div class="position-absolute start-0 bottom-0 tw-mb-5 tw-ms-4">
                                <ul class="d-flex tw-gap-2 flex-wrap row-gap-3">
                                    <li class="bg-white tw-rounded-3xl tw-py-2 tw-px-6 fw-medium text-heading">Luxury</li>
                                    <li class="bg-white tw-rounded-3xl tw-py-2 tw-px-6 fw-medium text-heading d-inline-flex tw-gap-2 align-items-center"><span class="d-inline-block lh-1"><img src="{{asset('assets/images/icons/service-two-icon1.svg')}}" alt=""></span> 900 Sqft</li>
                                    <li class="bg-white tw-rounded-3xl tw-py-2 tw-px-6 fw-medium text-heading d-inline-flex tw-gap-2 align-items-center"><span class="d-inline-block lh-1"><img src="{{asset('assets/images/icons/service-two-icon2.svg')}}" alt=""></span> 4 guest</li>
                                </ul>
                            </div>
                        </div>
                        <div class="service-two-content">
                            <h4 class="service-two-title tw-text-2xl fw-normal border-bottom border-neutral tw-pb-4"><a href="room-details.html">Royal Deluxe Room</a></h4>
                            <span class="service-two-price font-heading tw-text-10 fw-normal text-heading">$599</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="service-two-wrapper tw-mb-7 tw_fade_anim" data-delay=".7">
                        <div class="service-two-thumb position-relative z-1 tw-mb-7">
                            <a href="room-details.html"><img class="tw-rounded-lg" src="{{asset('assets/images/thumbs/service-two-thumb3.jpg')}}" alt="thumb"></a>
                            <div class="position-absolute start-0 bottom-0 tw-mb-5 tw-ms-4">
                                <ul class="d-flex tw-gap-2 flex-wrap row-gap-3">
                                    <li class="bg-white tw-rounded-3xl tw-py-2 tw-px-6 fw-medium text-heading">Luxury</li>
                                    <li class="bg-white tw-rounded-3xl tw-py-2 tw-px-6 fw-medium text-heading d-inline-flex tw-gap-2 align-items-center"><span class="d-inline-block lh-1"><img src="{{asset('assets/images/icons/service-two-icon1.svg')}}" alt=""></span> 900 Sqft</li>
                                    <li class="bg-white tw-rounded-3xl tw-py-2 tw-px-6 fw-medium text-heading d-inline-flex tw-gap-2 align-items-center"><span class="d-inline-block lh-1"><img src="{{asset('assets/images/icons/service-two-icon2.svg')}}" alt=""></span> 4 guest</li>
                                </ul>
                            </div>
                        </div>
                        <div class="service-two-content">
                            <h4 class="service-two-title tw-text-2xl fw-normal border-bottom border-neutral tw-pb-4"><a href="room-details.html">Presidential Suite</a></h4>
                            <span class="service-two-price font-heading tw-text-10 fw-normal text-heading">$599</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="background-img position-relative z-1 tw-pt-25 tw-pb-23 tw_fade_anim" data-background-image="{{asset('assets/images/thumbs/cta-three-bg2.jpg')}}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12">
                    <div class="cta-three-wrapper tw-pt-27 tw-pb-22 tw-px-20">
                        <div class="section-two-wrapper text-center tw-mb-8">
                            <h6 class="section-two-subtitle tw-text-xl text-uppercase text-main-three-600 tw-mb-4">Find unique homes in vibrant places.</h6>
                            <h2 class="section-two-title tw-text-25 text-white fw-normal tw-char-animation">Book Your Beachside
                                Escape Today</h2>
                        </div>
                        <div class="tw-mt-6 text-center">
                                                    <a class="tw-btn-hover-yellow bg-main-three-600 tw-py-6 tw-px-16 text-capitalize text-white font-heading d-inline-flex fw-bold align-items-center tw-gap-2" href="contact.html">make reservation <span class="d-inline-block lh-1 tw-text-lg"><i class="ph ph-arrow-up-right"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@include('home::layouts.include.footer')
