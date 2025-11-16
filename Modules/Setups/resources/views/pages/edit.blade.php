@extends('layouts.dashboard')
@section("breadcrumbs")
    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route("dashboard.index") }}"><i data-lucide="home"></i> {{ __("menus.sidebar.home") }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route("setups.pages.index") }}">{{ __("menus.sidebar.role.pages") }}</a></li>
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
                            <form method="post" autocomplete="off" action="{{ route("setups.pages.update", $row->id) }}">
                                @csrf
                                <div class="form-group mb-4">
                                    <p>{{ __("label.form.category.name") }}</p>
                                    <label for="inlineFormSelectCate" class="visually-hidden">{{ __("label.form.category.name") }}</label>
                                    <select class="form-select" id="inlineFormSelectCate" name="cboCategory" autofocus tabindex="1">
                                        @foreach ($modulesItem as $cateId => $cateName)
                                            <option value="{{ $cateId }}" @if ($row->module_id == $cateId) selected @endif>{{ $cateName }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-4">
                                    <p>Route Name <code>*</code></p>
                                    <label for="t-Route" class="visually-hidden">Route Name</label>
                                    <input value="{{ old("txtRoute", $row->default_action) }}" id="t-Route" type="text" name="txtRoute" placeholder="Route Name" class="form-control" required tabindex="2"  />
                                </div>
                                <div class="form-group mb-4">
                                    <p>{{ __("label.form.pages") }} <code>*</code></p>
                                    <label for="t-Pages" class="visually-hidden">{{ __("label.form.pages") }}</label>
                                    <input value="{{ old("txtPages", $row->name) }}" id="t-Pages" type="text" name="txtPages" placeholder="{{ __("label.form.pages") }}" class="form-control" required tabindex="3"  />
                                </div>
                                <div class="form-group mb-4">
                                    <p>{{ __("label.form.pages.kh") }} <code>*</code></p>
                                    <label for="t-PagesKh" class="visually-hidden">{{ __("label.form.pages.kh") }}</label>
                                    <input value="{{ old("txtPagesKh", $row->name_kh) }}" id="t-PagesKh" type="text" name="txtPagesKh" placeholder="{{ __("label.form.pages.kh") }}" class="form-control" required tabindex="4">
                                </div>
                                <div class="form-group mb-4">
                                    <p>{{ __("label.form.modules.icon") }}</p>
                                    <label for="t-ModuleIcon" class="visually-hidden">{{ __("label.form.modules.icon") }}</label>
                                    <input value="{{ old("txtModuleIcon", $row->icon) }}" id="t-ModuleIcon" type="text" name="txtModuleIcon" placeholder="{{ __("label.form.modules.icon") }}" class="form-control" tabindex="5">
                                </div>
                                <div class="form-group mb-4">
                                    <p>{{ __("label.form.modules.order") }} <code>*</code></p>
                                    <label for="t-ModuleOrder" class="visually-hidden">{{ __("label.form.modules.order") }}</label>
                                    <input value="{{ old("txtModuleOrder", $row->order) }}" id="t-ModuleOrder" type="text" name="txtModuleOrder" placeholder="{{ __("label.form.modules.order") }}" class="form-control" required tabindex="6">
                                </div>
                                <button type="submit" class="mt-4 mb-4 btn btn-primary" name="submit" value="save">{{ __("label.button.save") }}</button>
                                <a href="{{ route("setups.pages.index") }}"  class="mt-4 mb-4 btn btn-warning">{{ __("label.button.back") }}</a>

                            </form>
                        </div>
                        <div class="col-12 col-xxl-4 col-xl-3 col-lg-2 col-md-2 col-sm-1"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
