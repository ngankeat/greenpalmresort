<div class="loading-screen" id="loading-screen">
        <span class="bar top-bar"></span>
        <span class="bar down-bar"></span>
        <div class="animation-preloader">
            <div class="position-relative z-1">
                <div class="loader-border"></div>
                <div class="loader-logo position-absolute top-50 start-50 translate-middle tw-z-999">
                    <img class="position-relative tw-z-999" src="{{asset('assets/images/logo/favicon.png')}}" alt="brand">
                </div>
            </div>
            <div class="txt-loading tw-mt-10">
                <span data-text-preloader="E" class="letters-loading">
                    E
                </span>
                <span data-text-preloader="l" class="letters-loading">
                    l
                </span>
                <span data-text-preloader="i" class="letters-loading">
                    i
                </span>
                <span data-text-preloader="t" class="letters-loading">
                    t
                </span>
                <span data-text-preloader="e" class="letters-loading">
                    e
                </span>
				<span data-text-preloader="S" class="letters-loading">
                    S
                </span>
				<span data-text-preloader="t" class="letters-loading">
                    t
                </span>
				<span data-text-preloader="a" class="letters-loading">
                    a
                </span>
				<span data-text-preloader="y" class="letters-loading">
                    y
                </span>
            </div>
        </div>
    </div>
    <!--==================== Preloader End ====================-->
    <div class="search-popup-overlay"></div>
    <!-- Search Popup End-->

    <!--==================== Overlay Start ====================-->
    <div class="overlay"></div>
    <!--==================== Overlay End ====================-->

    <!--==================== Sidebar Overlay End ====================-->
    <div class="side-overlay"></div>
    <!--==================== Sidebar Overlay End ====================-->

    <!-- Custom Toast Message start -->
    <div id="toast-container"></div>
    <!-- Custom Toast Message End -->

    <!-- ==================== Scroll to Top End Here ==================== -->
    <div class="progress-wrap cursor-big">
      <svg
        class="progress-circle svg-content"
        width="100%"
        height="100%"
        viewBox="-1 -1 102 102"
      >
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
      </svg>
    </div>
    <!-- ==================== Scroll to Top End Here ==================== -->

    <!-- Custom Cursor Start -->
    <div class="cursor"></div>
    <span class="dot"></span>
    <!-- Custom Cursor End -->

    <!-- ==================== Mobile Menu Start Here ==================== -->
<div class="mobile-menu d-lg-none d-block scroll-sm position-fixed bg-white tw-w-300-px tw-h-screen overflow-y-auto tw-p-6 tw-z-999 tw--translate-x-full tw-pb-68 ">

    <button type="button" class="close-button position-absolute tw-end-0 top-0 tw-me-2 tw-mt-2 tw-w-605 tw-h-605 rounded-circle d-flex justify-content-center align-items-center text-neutral-900 bg-neutral-200 hover-bg-neutral-900 hover-text-white">
        <i class="ph ph-x"></i>
    </button>

    <div class="mobile-menu__inner">
        <a href="{{route('home.index')}}" class="mobile-menu__logo">
            <img src="{{asset('assets/images/logo/logo.png')}}" alt="Logo">
        </a>
        <div class="mobile-menu__menu">
            <!-- Nav menu Start -->
<ul class="nav-menu d-lg-flex align-items-center nav-menu--mobile d-block tw-mt-8">
    <li class="nav-menu__item activePage">
        <a href="{{route('home.index')}}" class="nav-menu__link tw-pe-5 text-white font-heading tw-py-11 fw-normal w-100">Home</a>
    </li>
    <li class="nav-menu__item position-relative">
        <a href="{{route('home.offer')}}" class="nav-menu__link tw-pe-5 text-white font-heading tw-py-11 fw-normal w-100">Special Offers</a>
    </li>
    <li class="nav-menu__item has-submenu position-relative">
        <a href="javascript:void(0)" class="nav-menu__link tw-pe-5 text-white font-heading tw-py-11 fw-normal w-100">Accommodations</a>
        <ul class="nav-submenu scroll-sm position-absolute start-0 top-100 tw-w-max bg-white tw-rounded-md overflow-hidden tw-p-2 tw-duration-200 tw-z-99">
            <li class="nav-submenu__item d-block tw-rounded tw-duration-200 position-relative">
                <a href="{{route('home.room')}}" class="nav-submenu__link hover-bg-neutral-200 text-heading font-heading fw-normal w-100 d-block tw-py-2 tw-px-305 tw-rounded">Room</a>
            </li>
            <li class="nav-submenu__item d-block tw-rounded tw-duration-200 position-relative">
                <a href="room-details.html" class="nav-submenu__link hover-bg-neutral-200 text-heading font-heading fw-normal w-100 d-block tw-py-2 tw-px-305 tw-rounded">Room Details</a>
            </li>
        </ul>
    </li>
    <li class="nav-menu__item position-relative">
        <a href="javascript:void(0)" class="nav-menu__link tw-pe-5 text-white font-heading tw-py-11 fw-normal w-100">Gallery</a>
    </li>
    <li class="nav-menu__item position-relative">
        <a href="javascript:void(0)" class="nav-menu__link tw-pe-5 text-white font-heading tw-py-11 fw-normal w-100">Dining</a>
    </li>
    <li class="nav-menu__item">
        <a href="contact.html" class="nav-menu__link text-white font-heading tw-py-11 fw-normal w-100">Contact</a>
    </li>
	<li class="nav-menu__item">
        <a href="contact.html" class="nav-menu__link text-white font-heading tw-py-11 fw-normal w-100">About Us</a>
    </li>
</ul>
<!-- Nav menu End  -->
        </div>
    </div>
</div>
<!-- ==================== Mobile Menu End Here ==================== -->

<!-- ==================== Header Start Here ==================== -->
<header class="header tw-transition-all tw-z-99 header-transparent">
    <div class="container tw-container-1750-px">
        <nav class="d-flex align-items-center justify-content-between position-relative">
            <!-- Logo Start -->
            <div class="logo">
                <a href="{{route('home.index')}}" class="link">
                    <img src="{{asset('assets/images/logo/logo.png')}}" alt="Logo" class="max-w-200-px">
                </a>
            </div>
            <!-- Logo End  -->

            <!-- Menu Start  -->
            <div class="header-menu d-lg-block d-none">
                <!-- Nav menu Start -->
<ul class="nav-menu d-lg-flex align-items-center tw-gap-8">
    <li class="nav-menu__item activePage">
        <a href="{{route('home.index')}}" class="nav-menu__link tw-pe-5 text-white font-heading tw-py-11 fw-normal w-100">Home</a>
    </li>
    <li class="nav-menu__item position-relative">
        <a href="{{route('home.offer')}}" class="nav-menu__link tw-pe-5 text-white font-heading tw-py-11 fw-normal w-100">Special Offers</a>
    </li>
    <li class="nav-menu__item has-submenu position-relative">
        <a href="javascript:void(0)" class="nav-menu__link tw-pe-5 text-white font-heading tw-py-11 fw-normal w-100">Accommodations</a>
        <ul class="nav-submenu scroll-sm position-absolute start-0 top-100 tw-w-max bg-white tw-rounded-md overflow-hidden tw-p-2 tw-duration-200 tw-z-99">
            <li class="nav-submenu__item d-block tw-rounded tw-duration-200 position-relative">
                <a href="{{route('home.room')}}" class="nav-submenu__link hover-bg-neutral-200 text-heading font-heading fw-normal w-100 d-block tw-py-2 tw-px-305 tw-rounded">Room</a>
            </li>
            <li class="nav-submenu__item d-block tw-rounded tw-duration-200 position-relative">
                <a href="room-details.html" class="nav-submenu__link hover-bg-neutral-200 text-heading font-heading fw-normal w-100 d-block tw-py-2 tw-px-305 tw-rounded">Room Details</a>
            </li>
        </ul>
    </li>
    <li class="nav-menu__item position-relative">
        <a href="javascript:void(0)" class="nav-menu__link tw-pe-5 text-white font-heading tw-py-11 fw-normal w-100">Gallery</a>
    </li>
    <li class="nav-menu__item position-relative">
        <a href="javascript:void(0)" class="nav-menu__link tw-pe-5 text-white font-heading tw-py-11 fw-normal w-100">Dining</a>
    </li>
    <li class="nav-menu__item">
        <a href="contact.html" class="nav-menu__link text-white font-heading tw-py-11 fw-normal w-100">Contact</a>
    </li>
	<li class="nav-menu__item">
        <a href="contact.html" class="nav-menu__link text-white font-heading tw-py-11 fw-normal w-100">About Us</a>
    </li>
</ul>
<!-- Nav menu End  -->
            </div>
            <!-- Menu End  -->

            <!-- Header Right start -->
            @if (Route::is('home.index'))
                @include('home::layouts.partials.right_home')
            @else
                @include('home::layouts.partials.right_offer')
            @endif
            <!-- Header Right End  -->

        </nav>
    </div>
</header>
