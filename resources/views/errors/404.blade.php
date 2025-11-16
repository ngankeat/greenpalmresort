<!DOCTYPE html>
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
    <link href="{{ asset("src/assets/css/light/pages/error/error.css") }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <style>
        body.dark .theme-logo.dark-element {
            display: inline-block;
        }
        .theme-logo.dark-element {
            display: none;
        }
        body.dark .theme-logo.light-element {
            display: none;
        }
        .theme-logo.light-element {
            display: inline-block;
        }
    </style>

</head>
<body class="error text-center">

<!-- BEGIN LOADER -->
<div id="load_screen"> <div class="loader"> <div class="loader-content">
            <div class="spinner-grow align-self-center"></div>
        </div></div></div>
<!--  END LOADER -->

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 mr-auto mt-5 text-md-left text-center">
            <a href="index.html" class="ml-md-5">
                <img alt="image-404" src="{{ asset("src/assets/img/logo.svg") }}" class="dark-element theme-logo">
                <img alt="image-404" src="{{ asset("src/assets/img/logo2.svg") }}" class="light-element theme-logo">
            </a>
        </div>
    </div>
</div>
<div class="container-fluid error-content">
    <div class="">
        <h1 class="error-number">404</h1>
        <p class="mini-text">Ooops!</p>
        <p class="error-text mb-5 mt-1">The page you requested was not found!</p>
        <img src="{{ asset("src/assets/img/error.svg") }}" alt="cork-admin-404" class="error-img">
        <a href="{{ route("dashboard.index") }}" class="btn btn-dark mt-5">Go Back</a>
    </div>
</div>
<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="{{ asset("src/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->
</body>
</html>
