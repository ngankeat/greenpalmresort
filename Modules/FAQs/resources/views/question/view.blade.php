@extends('layouts.dashboard')
@section("css")
    <link rel="stylesheet" href="{{ asset("src/plugins/css/light/editors/markdown/simplemde.min.css") }}" />
@endsection
@section("breadcrumbs")
    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route("dashboard.index") }}"><i data-lucide="home"></i> {{ __("menus.sidebar.home") }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route("faqs.question.index") }}">{{ __("menus.sidebar.faqs.question") }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __("menus.sidebar.view") }}</li>
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
                            <h4>{{ __("menus.sidebar.view") }}</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="row">
                        <div class="col-12 col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-1"></div>
                        <div class="col-12 col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-9">
                            <form>
                                @csrf
                                <div class="form-group mb-4">
                                    <p>{{ __("label.form.category.name") }}</p>
                                    <label for="inlineFormSelectCate" class="visually-hidden">{{ __("label.form.category.name") }}</label>
                                    <select class="form-select" id="inlineFormSelectCate" name="cboCategory" autofocus tabindex="1" disabled>
                                        @foreach ($category as $cateId => $cateName)
                                            <option value="{{ $cateId }}" @if ($item->cate_id == $cateId) selected @endif>{{ $cateName }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-4">
                                    <p>{{ __("label.form.question") }} <code>*</code></p>
                                    <label for="t-Question" class="visually-hidden">{{ __("label.form.question") }}</label>
                                    <input disabled value="{{ old("txtQuestion", $item->name) }}" id="t-Question" type="text" name="txtQuestion" placeholder="{{ __("label.form.question") }}" class="form-control" required tabindex="2"  />
                                    @error('txtQuestion')
                                    <span class="error text-danger pt-5">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <p>{{ __("label.form.question.answer") }} <code>*</code></p>
                                    <label for="demo1" class="visually-hidden">{{ __("label.form.question.answer") }}</label>
                                    <label>
                                        {!! $item->description !!}
                                    </label>
                                    @error('txtAnswer')
                                    <span class="error text-danger pt-5">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <p>{{ __("label.form.modules.order") }} <code>*</code></p>
                                    <label for="t-ModuleOrder" class="visually-hidden">{{ __("label.form.modules.order") }}</label>
                                    <input disabled value="{{ old("txtModuleOrder", $item->order) }}" id="t-ModuleOrder" type="text" name="txtModuleOrder" placeholder="{{ __("label.form.modules.order") }}" class="form-control" required tabindex="4">
                                    @error('txtModuleOrder')
                                    <span class="error text-danger pt-5">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <p>{{ __("label.form.category.sound") }}</p>
                                    <label for="t-Sound" class="visually-hidden">{{ __("label.form.category.sound") }}</label>
                                    @if (!is_null($item->sound) AND !empty($item->sound))
                                        <audio controls>
                                            <source src="{{ asset("faqs/sounds/question")."/".$item->sound }}" type="audio/mpeg">
                                        </audio>
                                    @endif
                                </div>
                                <div class="form-group mb-4">
                                    <p>{{ __("label.form.modules.icon") }}</p>
                                    <label for="t-ModuleIcon" class="visually-hidden">{{ __("label.form.modules.icon") }}</label>
                                    @if (!is_null($item->icon) AND !empty($item->icon))
                                        <img src="{{ asset("faqs/icons/question/") }}/{{ $item->icon }}" />
                                    @endif
                                </div>
                                <a href="{{ route("faqs.question.index") }}"  class="mt-4 mb-4 btn btn-warning">{{ __("label.button.back") }}</a>
                            </form>
                        </div>
                        <div class="col-12 col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-1"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section("script")
    <script src="{{ asset("src/plugins/src/editors/markdown/simplemde.min.js") }}"></script>
    <style>
        .CodeMirror {
            height: 200px;
        }
    </style>
    <script>
        new SimpleMDE({
            element: document.getElementById("demo1"),
            spellChecker: false,
        });
    </script>

@endsection
