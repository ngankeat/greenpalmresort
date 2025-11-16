@extends('layouts.dashboard')
@section("css")
    <link rel="stylesheet" href="{{ asset("src/plugins/src/summernote/summernote-lite.css") }}" />
@endsection
@section("breadcrumbs")
    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route("dashboard.index") }}"><i data-lucide="home"></i> {{ __("menus.sidebar.home") }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route("faqs.gallery.index") }}">{{ __("menus.sidebar.faqs.contact") }}</a></li>
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
                        <div class="col-12 col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-1"></div>
                        <div class="col-12 col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-9">
                            <form method="post" autocomplete="off" action="{{ route("faqs.gallery.store") }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-4">
                                    <p>{{ __("label.form.contact.title") }} <code>*</code></p>
                                    <label for="t-name" class="visually-hidden">{{ __("label.form.contact.title") }}</label>
                                    <input id="t-name" type="text" name="name" placeholder="{{ __("label.form.contact.title") }}" class="form-control" required autofocus tabindex="1"  />
                                    @error('txtContact')
                                    <span class="error text-danger pt-5">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <p>{{ __("label.form.modules.gallery") }}</p>
                                    <label for="t-ModuleIcon" class="visually-hidden">{{ __("label.form.modules.gallery") }}</label>
                                    <input id="t-ModuleIcon" class="form-control file-upload-input" type="file" name="gallery[]" multiple tabindex="4"/>
                                </div>
                                <button type="submit" class="mt-4 mb-4 btn btn-primary" name="submit" value="save">{{ __("label.button.save") }}</button>
                                <button type="submit" class="mt-4 mb-4 btn btn-info" value="saveCreate">{{ __("label.button.save.create") }}</button>
                                <a href="{{ route("faqs.contact.index") }}"  class="mt-4 mb-4 btn btn-warning">{{ __("label.button.back") }}</a>

                            </form>
                        </div>
                        <div class="col-12 col-xxl-4 col-xl-3 col-lg-2 col-md-2 col-sm-1"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section("script")
    <script src="{{ asset("src/plugins/src/summernote/summernote-lite.min.js") }}"></script>
    <script>
        $('#summernote').summernote({
            tabsize: 2,
            height: 200
        });
    </script>

@endsection
