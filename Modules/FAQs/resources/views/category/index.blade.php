@extends('layouts.dashboard')
@section("css")
    <link rel="stylesheet" type="text/css" href="{{ asset("src/plugins/src/table/datatable/datatables.css") }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset("src/plugins/css/light/table/datatable/dt-global_style.css") }}"/>
    <link href="{{ asset("src/plugins/src/sweetalerts2/sweetalerts2.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("src/plugins/css/light/sweetalerts2/custom-sweetalert.css") }}" rel="stylesheet" type="text/css" />
@endsection
@section("breadcrumbs")
    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route("dashboard.index") }}"><i data-lucide="home"></i> {{ __("menus.sidebar.home") }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __("menus.sidebar.faqs.category") }}</li>
        </ol>
    </nav>
@endsection
@section("actions")
    @isset($pageActions['action'])
        @foreach($pageActions['action'] as $action)
            @if($action['action_type'] == 'edit')
                <a href="{{ route("faqs.category.create") }}"><i data-lucide="list-plus"></i></a>
            @endif
        @endforeach
    @endisset
@endsection
@section('content')
    <div class="row layout-top-spacing">
        <div class="col-12">
            <div class="widget-content widget-content-area br-8">
                <div class="table-responsive">
                    {!! $dataTable->table(['class' => 'table dt-table-hover', 'style' => 'width:100%'], true) !!}
                </div>
            </div>

        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset("src/plugins/src/sweetalerts2/sweetalerts2.min.js") }}"></script>
    <script src="{{ asset("src/plugins/src/table/datatable/datatables.js") }}"></script>
    <script>
        function confirm(url, condi){
            if (condi == 1) {
                Swal.fire({
                    title: '{{ __("messages.confirm.delete") }}',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#e7515a',
                    cancelButtonColor: '#e2a03f',
                    confirmButtonText: '{{ __("label.button.delete") }}!',
                    cancelButtonText: '{{ __("label.button.back") }}'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.href = url;
                    }
                });
            } else {
                Swal.fire({
                    title: '{{ __("messages.confirm.back") }}',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#e7515a',
                    cancelButtonColor: '#e2a03f',
                    confirmButtonText: '{{ __("label.button.get.back") }}!',
                    cancelButtonText: '{{ __("label.button.back") }}'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.href = url;
                    }
                })
            }
        }
    </script>
    {!! $dataTable->scripts() !!}

@endsection
