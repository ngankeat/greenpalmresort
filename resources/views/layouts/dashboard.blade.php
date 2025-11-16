<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>{{ __("label.title.mlvt") }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset("src/assets/img/favicon.ico") }}"/>
    <link href="{{ asset("layouts/modern-light-menu/css/light/loader.css") }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset("layouts/modern-light-menu/loader.js") }}"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Koh+Santepheap:wght@400;700&family=Koulen&display=swap"
          rel="stylesheet">
    <link href="{{ asset("src/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("layouts/modern-light-menu/css/light/plugins.css") }}" rel="stylesheet" type="text/css" />
    <script src="https://unpkg.com/lucide@latest"></script>
    @yield("css")
</head>
<body class="layout-boxed">
    <!-- BEGIN LOADER -->
    <div id="load_screen">
        <div class="loader">
            <div class="loader-content">
                <div class="spinner-grow align-self-center"></div>
            </div>
        </div>
    </div>
    <!--  END LOADER -->
    <!--  BEGIN NAVBAR  -->
    <x-navbar></x-navbar>
    <!--  END NAVBAR  -->
    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container " id="container">
        <div class="overlay"></div>
        <div class="search-overlay"></div>
        <!--  BEGIN SIDEBAR  -->
        <x-sidebar></x-sidebar>
        <!--  END SIDEBAR  -->
        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                <div class="middle-content container-xxl p-0">
                    <!-- BREADCRUMB -->
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-5 col-sm-7 filtered-list-search  align-self-center">
                            <div class="page-meta">
                                @yield("breadcrumbs")
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-7 col-md-7 col-sm-5 text-sm-right text-center align-self-center">
                            <div class="page-meta" style="margin-right: 20px">
                                <div class="d-flex justify-content-sm-end justify-content-center">
                                    <div class="switch align-self-center">
                                        @yield("actions")
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /BREADCRUMB -->
                    <!-- CONTENT AREA -->
                    @yield("content")
                    <!-- /CONTENT AREA -->
                </div>
            </div>
            <x-footer></x-footer>
        </div>
        <!--  END CONTENT AREA  -->
    </div>
    <!-- END MAIN CONTAINER -->
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset("src/plugins/src/global/vendors.min.js") }}"></script>
    <script src="{{ asset("src/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
    <script src="{{ asset("src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js") }}"></script>
    <script src="{{ asset("src/plugins/src/mousetrap/mousetrap.min.js") }}"></script>
    <script src="{{ asset("src/plugins/src/waves/waves.min.js") }}"></script>
    <script src="{{ asset("layouts/modern-light-menu/app.js") }}"></script>
    <script src="{{ asset("src/assets/js/custom.js") }}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->


    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        lucide.createIcons();
    </script>
    @yield("script")
</body>
</html>
