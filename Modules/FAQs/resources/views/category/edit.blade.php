@extends('layouts.dashboard')
@section("breadcrumbs")
    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route("dashboard.index") }}"><i data-lucide="home"></i> {{ __("menus.sidebar.home") }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route("faqs.category.index") }}">{{ __("menus.sidebar.faqs.category") }}</a></li>
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
                        <div class="col-12 col-xxl-4 col-xl-3 col-lg-2 col-md-2 col-sm-1"></div>
                        <div class="col-12 col-xxl-4 col-xl-6 col-lg-8 col-md-8 col-sm-9">
                            <form method="post" autocomplete="off" action="{{ route("faqs.category.update", $module->id) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-4">
                                    <p>{{ __("label.form.category.name") }} <code>*</code></p>
                                    <label for="t-Category" class="visually-hidden">{{ __("label.form.category.name") }}</label>
                                    <input value="{{ old("txtModuleKh", $module->name) }}" id="t-Category" type="text" name="txtCategory" placeholder="{{ __("label.form.category.name") }}" class="form-control" required autofocus tabindex="1"  />
                                    @error('txtCategory')
                                    <span class="error text-danger pt-5">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <p>{{ __("label.form.modules.order") }} <code>*</code></p>
                                    <label for="t-ModuleOrder" class="visually-hidden">{{ __("label.form.modules.order") }}</label>
                                    <input value="{{ old("txtModuleKh", $module->order) }}" id="t-ModuleOrder" type="text" name="txtModuleOrder" placeholder="{{ __("label.form.modules.order") }}" class="form-control" required tabindex="2">
                                    @error('txtModuleOrder')
                                    <span class="error text-danger pt-5">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <p>{{ __("label.form.category.sound") }}</p>
                                    <label for="t-Sound" class="visually-hidden">{{ __("label.form.category.sound") }}</label>
                                    <input id="t-Sound" class="form-control file-upload-input" type="file" name="fileSound" tabindex="3"/>
                                </div>
                                <div>
                                    <input type="hidden" name="oldSound" value="{{ $module->sound }}" />
                                    @if (!is_null($module->sound) AND !empty($module->sound))
                                        <audio controls>
                                            <source src="{{ asset("faqs/sounds/category")."/".$module->sound }}" type="audio/mpeg">
                                        </audio>
                                    @endif
                                </div>
                                <div class="form-group mb-4">
                                    <p>{{ __("label.form.modules.icon") }}</p>
                                    <label for="t-ModuleIcon" class="visually-hidden">{{ __("label.form.modules.icon") }}</label>
                                    <input id="t-ModuleIcon" class="form-control file-upload-input" type="file" name="fileIcon" tabindex="4"/>
                                </div>
                                <div class="form-group mb-4">
                                    <input type="hidden" name="oldIcon" value="{{ $module->icon }}" />
                                    @if (!is_null($module->icon) AND !empty($module->icon))
                                    <img src="{{ asset("faqs/icons/category/") }}/{{ $module->icon }}" />
                                    @endif
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
