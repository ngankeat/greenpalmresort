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
            <li class="breadcrumb-item active" aria-current="page">{{ __("menus.sidebar.role.pages") }}</li>
        </ol>
    </nav>
@endsection
@section("actions")
    <a href="{{ route("setups.pages.create") }}"><i data-lucide="list-plus"></i></a>
@endsection
@section('content')
    <div class="row layout-top-spacing">
        <div class="col-12">
            <div class="widget-content widget-content-area br-8">
                <div class="table-form">
                    <form class="row row-cols-lg-auto g-3 align-items-center" id="filter">
                        <div class="col-12">
                            <label class="visually-hidden" for="inlineFormSelectCate">Category</label>
                            <select class="form-select" id="inlineFormSelectCate" name="cboCategory">
                                <option selected value="">{{ __("label.form.modules") }}</option>
                                @foreach ($modulesItem as $itemId => $itemName)
                                    <option value="{{ $itemId }}">{{ $itemName }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="visually-hidden" for="inlineFormSelectStatus">Status</label>
                            <select class="form-select" id="inlineFormSelectStatus" name="cboStatus">
                                <option selected value="">{{ __("label.table.th.status") }}</option>
                                <option value="1">{{ __("label.button.active") }}</option>
                                <option value="2">{{ __("label.button.deleted") }}</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">{{ __("label.button.search") }}</button>
                        </div>
                    </form>
                </div>
                <hr />
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
