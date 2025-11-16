@extends('layouts.dashboard')
@section("css")
    @livewireStyles
@endsection
@section("breadcrumbs")
    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route("dashboard.index") }}"><i data-lucide="home"></i> {{ __("menus.sidebar.home") }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route("setups.pages.index") }}">{{ __("menus.sidebar.role.pages") }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __("menus.sidebar.actions") }}</li>
        </ol>
    </nav>
@endsection
@section('content')
    <div class="row layout-top-spacing">
        <div class="col-12">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>{{ __("menus.sidebar.actions") }}</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="row">
                        <div class="col-12 col-xxl-4 col-xl-4 col-lg-2 col-md-6 col-sm-12">
                            <form>
                                <div class="form-group mb-4">
                                    <p>Route Name <code>*</code></p>
                                    <label for="t-Route" class="visually-hidden">Route Name</label>
                                    <input disabled value="{{ old("txtRoute", $row->default_action) }}" id="t-Route" type="text" name="txtRoute" placeholder="Route Name" class="form-control" required tabindex="2"  />
                                </div>
                                <div class="form-group mb-4">
                                    <p>{{ __("label.form.pages") }} <code>*</code></p>
                                    <label for="t-Pages" class="visually-hidden">{{ __("label.form.pages") }}</label>
                                    <input disabled value="{{ old("txtPages", $row->name) }}" id="t-Pages" type="text" name="txtPages" placeholder="{{ __("label.form.pages") }}" class="form-control" required tabindex="3"  />
                                </div>
                                <div class="form-group mb-4">
                                    <p>{{ __("label.form.pages.kh") }} <code>*</code></p>
                                    <label for="t-PagesKh" class="visually-hidden">{{ __("label.form.pages.kh") }}</label>
                                    <input disabled value="{{ old("txtPagesKh", $row->name_kh) }}" id="t-PagesKh" type="text" name="txtPagesKh" placeholder="{{ __("label.form.pages.kh") }}" class="form-control" required tabindex="4">
                                </div>
                                <a href="{{ route("setups.pages.index") }}"  class="mt-4 mb-4 btn btn-warning">{{ __("label.button.back") }}</a>
                            </form>
                        </div>
                        <div class="col-12 col-xxl-8 col-xl-8 col-lg-10 col-md-6 col-sm-12"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scription')
    @livewireScripts
@endsection
