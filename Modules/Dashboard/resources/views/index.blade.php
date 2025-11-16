@extends('layouts.dashboard')
@section("breadcrumbs")
    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route("dashboard.index") }}"><i data-lucide="home"></i> {{ __("menus.sidebar.home") }}</a></li>
        </ol>
    </nav>
@endsection
@section('content')
    <div class="row layout-top-spacing">
        <div class="col-12">
            <div class="statbox widget box box-shadow">
                <div class="widget-content widget-content-area br-8" style="border: none;">
                    <h3>Testing</h3>
                </div>
            </div>
        </div>
    </div>
@endsection
