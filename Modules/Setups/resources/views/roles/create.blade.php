@extends('layouts.dashboard')
@section("breadcrumbs")
    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route("dashboard.index") }}"><i data-lucide="home"></i> {{ __("menus.sidebar.home") }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route("setups.roles.index") }}">{{ __("menus.sidebar.role.permission") }}</a></li>
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
                    <form id="role-form" method="post" autocomplete="off" action="{{ route("setups.roles.store") }}">
                        <div class="row">
                            <div class="col-6">
                                @csrf
                                <div class="form-group mb-4">
                                    <p>{{ __("label.form.actions.permission") }} <code>*</code></p>
                                    <label for="t-Permission" class="visually-hidden">{{ __("label.form.actions.permission") }}</label>
                                    <input id="t-Permission" type="text" name="txtPermission" placeholder="{{ __("label.form.actions.permission") }}" class="form-control" required autofocus tabindex="1"  />
                                    @error('txtPermission')
                                    <span class="error text-danger pt-5">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <p>{{ __("label.form.actions.permission.kh") }} <code>*</code></p>
                                    <label for="t-PermissionKh" class="visually-hidden">{{ __("label.form.actions.permission.kh") }}</label>
                                    <input id="t-PermissionKh" type="text" name="txtPermissionKh" placeholder="{{ __("label.form.actions.permission.kh") }}" class="form-control" required tabindex="2">
                                    @error('txtPermissionKh')
                                    <span class="error text-danger pt-5">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <p>{{ __("label.form.actions.description") }}</p>
                                    <label for="t-Description" class="visually-hidden">{{ __("label.form.actions.description") }}</label>
                                    <textarea id="t-Description" type="text" name="txtDescription" placeholder="{{ __("label.form.actions.description") }}" class="form-control" tabindex="3"></textarea>
                                </div>
                                <button type="submit" class="mt-4 mb-4 btn btn-primary" name="submit" value="save">{{ __("label.button.save") }}</button>
                                <button type="submit" class="mt-4 mb-4 btn btn-info" value="saveCreate">{{ __("label.button.save.create") }}</button>
                                <a href="{{ route("setups.roles.index") }}"  class="mt-4 mb-4 btn btn-warning">{{ __("label.button.back") }}</a>
                            </div>
                            <div class="col-1"></div>
                            <div class="col-5">
                                <div class="tree-checkbox-hierarchical" name="permission_tree">
                                    {!! $tree !!}
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section("script")
    <script src="//code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
    <link href="//cdn.jsdelivr.net/npm/jquery.fancytree@2.27/dist/skin-win8/ui.fancytree.min.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/jquery.fancytree@2.27/dist/jquery.fancytree-all-deps.min.js"></script>
    <script src="{{ asset('src/plugins/pages/role.js') }}"></script>
@endsection
