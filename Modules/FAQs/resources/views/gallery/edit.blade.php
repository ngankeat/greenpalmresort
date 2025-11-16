@extends('layouts.dashboard')
@section("css")
    <link rel="stylesheet" href="{{ asset("src/plugins/src/summernote/summernote-lite.css") }}" />
@endsection
@section("breadcrumbs")
    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route("dashboard.index") }}"><i data-lucide="home"></i> {{ __("menus.sidebar.home") }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route("faqs.gallery.index") }}">{{ __("menus.sidebar.faqs.contact") }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __("menus.sidebar.edit") }}</li>
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
                            <h4>{{ __("menus.sidebar.edit") }}</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="row">
                        <div class="col-12 col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-1"></div>
                        <div class="col-12 col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-9">
                            <form method="post" autocomplete="off" action="{{ route("faqs.gallery.update", $module->id) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-4">
                                    <p>{{ __("label.form.contact.title") }} <code>*</code></p>
                                    <label for="t-Title" class="visually-hidden">{{ __("label.form.contact.title") }}</label>
                                    <input value="{{ old("txtModuleKh", $module->title) }}" id="t-Title" type="text" name="txtTitle" placeholder="{{ __("label.form.contact.title") }}" class="form-control" required autofocus tabindex="1"  />
                                    @error('txtTitle')
                                    <span class="error text-danger pt-5">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <p>{{ __("label.form.contact.title.kh") }} <code>*</code></p>
                                    <label for="t-Title_kh" class="visually-hidden">{{ __("label.form.contact.title.kh") }}</label>
                                    <input value="{{ old("txtModuleKh", $module->title_kh) }}" id="t-Title_kh" type="text" name="txtTitleKh" placeholder="{{ __("label.form.contact.title.kh") }}" class="form-control" required autofocus tabindex="1"  />
                                    @error('txtContact')
                                    <span class="error text-danger pt-5">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <p>{{ __("label.form.contact.descriptin") }} <code>*</code></p>
                                    <label for="t-tDescrioption" class="visually-hidden">{{ __("label.form.contact.descriptin") }}</label>
                                    <textarea id="summernote" name="txtDescrioption" placeholder="{{ __("label.form.contact.descriptin") }}" class="form-control" tabindex="3">{{ old("txtModuleKh", $module->description) }}</textarea>
                                    @error('txtAnswer')
                                    <span class="error text-danger pt-5">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <p>{{ __("label.form.contact.email") }} <code>*</code></p>
                                    <label for="t-Email" class="visually-hidden">{{ __("label.form.contact.email") }}</label>
                                    <input value="{{ old("txtModuleKh", $module->email) }}" id="t-Email" type="text" name="txtEmail" placeholder="{{ __("label.form.contact.email") }}" class="form-control" required autofocus tabindex="1"  />
                                    @error('txtContact')
                                    <span class="error text-danger pt-5">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <p>{{ __("label.form.contact.phone") }} <code>*</code></p>
                                    <label for="t-Phone" class="visually-hidden">{{ __("label.form.contact.phone") }}</label>
                                    <input value="{{ old("txtModuleKh", $module->phone) }}" id="t-Phone" type="text" name="txtPhone" placeholder="{{ __("label.form.contact.phone") }}" class="form-control" required autofocus tabindex="1"  />
                                    @error('txtContact')
                                    <span class="error text-danger pt-5">{{ $message }}</span>
                                    @enderror
                                </div>

                                <button type="submit" class="mt-4 mb-4 btn btn-primary" name="submit" value="save">{{ __("label.button.save") }}</button>
                                <a href="{{ route("faqs.category.index") }}"  class="mt-4 mb-4 btn btn-warning">{{ __("label.button.back") }}</a>

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
