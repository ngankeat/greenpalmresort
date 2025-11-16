<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>{{ __("label.title.mlvt") }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset("src/assets/img/favicon.ico") }}"/>
    <link href="{{ asset("layouts/modern-light-menu/css/light/loader.css") }}" rel="stylesheet" type="text/css"/>
    <script src="{{ asset("layouts/modern-light-menu/loader.js") }}"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Koh+Santepheap:wght@400;700&family=Koulen&display=swap"
          rel="stylesheet">
    <link href="{{ asset("src/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css"/>

    <link href="{{ asset("layouts/modern-light-menu/css/light/plugins.css") }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset("src/assets/css/light/authentication/auth-boxed.css") }}" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ asset("src/assets/css/light/elements/alert.css") }}">

</head>
<body class="form">

<!-- BEGIN LOADER -->
<div id="load_screen">
    <div class="loader">
        <div class="loader-content">
            <div class="spinner-grow align-self-center"></div>
        </div>
    </div>
</div>
<!--  END LOADER -->

<div class="auth-container d-flex">

    <div class="container mx-auto align-self-center">

        <div class="row">

            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-8 col-12 d-flex flex-column align-self-center mx-auto">
                <div class="card mt-3 mb-3">
                    <div class="card-body">
                        <center><img src="{{ asset("src/assets/img/mlvt.jpg") }}" style="width: 100px;" alt=""/> </center>
                        <form action="{{ url("login") }}" method="post" autocomplete="off">
                            {{ csrf_field() }}
                            <div class="row">
                                @if($errors->first('mobile_no') == 'These credentials do not match our records.')
                                    <div class="alert alert-light-danger alert-dismissible fade show border-0 mb-4" role="alert">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        លេខទូរស័ព្ទ និងពាក្យសម្ងាត់ គឺមិនត្រឹមត្រូវ។ សូមពិនិត្យមើលម្ដងទៀត!</button>
                                    </div>
                                @endif
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">{{ __("label.auth.username") }}</label>
                                        <input type="text" name="username" class="form-control">
                                        @if($errors->has('username') AND $errors->first('username') != 'These credentials do not match our records.')
                                            <div class="invalid-feedback" style="display: block">
                                                {{ $errors->first('username') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-4">
                                        <label class="form-label fw-bold">{{ __("label.auth.password") }}</label>
                                        <input type="password" name="password" class="form-control">
                                        @if($errors->has('password'))
                                            <div class="invalid-feedback" style="display: block">
                                                {{ $errors->first('password') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>


                                <div class="col-12">
                                    <div class="mb-4">
                                        <button class="btn btn-secondary w-100">{{ __("label.button.login") }}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="{{ asset("src/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->
</body>
</html>
