@extends('layouts.dashboard')
@section("breadcrumbs")
    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route("dashboard.index") }}"><i data-lucide="home"></i> {{ __("menus.sidebar.home") }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route("setups.users.index") }}">{{ __("menus.sidebar.role.user") }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __("menus.sidebar.create") }}</li>
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
                            <h4>{{ __("menus.sidebar.create") }}</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="row">
                        <div class="col-12 col-xxl-4 col-xl-3 col-lg-2 col-md-2 col-sm-1"></div>
                        <div class="col-12 col-xxl-4 col-xl-6 col-lg-8 col-md-8 col-sm-9">
                            <form method="post" autocomplete="off" action="{{ route("setups.users.store") }}">
                                @csrf
                                <div class="form-group mb-4">
                                    <p>{{ __("label.form.actions.permission") }}</p>
                                    <label for="inlineFormSelectRole" class="visually-hidden">{{ __("label.form.actions.permission") }}</label>
                                    <select class="form-select" id="inlineFormSelectRole" name="cboRole" autofocus tabindex="1">
                                        <option value="" selected>ជ្រើសរើស</option>
                                        @foreach ($role as $cateId => $cateName)
                                            <option value="{{ $cateId }}">{{ $cateName }}</option>
                                        @endforeach
                                    </select>
                                    @error('cboRole')
                                        <span class="error text-danger pt-5">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <p>{{ __("label.form.username") }} <code>*</code></p>
                                    <label for="t-username" class="visually-hidden">{{ __("label.form.username") }}</label>
                                    <input id="t-username" type="text" name="username" placeholder="{{ __("label.form.username") }}" class="form-control" required tabindex="2"  />
                                    @error('username')
                                        <span class="error text-danger pt-5">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <p>{{ __("label.auth.password") }} <code>*</code></p>
                                    <label for="password" class="visually-hidden">{{ __("label.auth.password") }}</label>
                                    <input id="password" type="password" name="password" placeholder="{{ __("label.auth.password") }}" class="form-control" required tabindex="3"  />
                                    @error('password')
                                        <span class="error text-danger pt-5">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <p>{{ __("label.auth.password.confirm") }} <code>*</code></p>
                                    <label for="password_confirmation" class="visually-hidden">{{ __("label.auth.password.confirm") }}</label>
                                    <input id="password_confirmation" type="password" name="password_confirmation" placeholder="{{ __("label.auth.password.confirm") }}" class="form-control" required tabindex="4">
                                    @error('password_confirmation')
                                    <span class="error text-danger pt-5">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="mt-4 mb-4 btn btn-primary" name="submit" value="save">{{ __("label.button.save") }}</button>
                                <button type="submit" class="mt-4 mb-4 btn btn-info" value="saveCreate">{{ __("label.button.save.create") }}</button>
                                <a href="{{ route("setups.users.index") }}"  class="mt-4 mb-4 btn btn-warning">{{ __("label.button.back") }}</a>

                            </form>
                        </div>
                        <div class="col-12 col-xxl-4 col-xl-3 col-lg-2 col-md-2 col-sm-1"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
