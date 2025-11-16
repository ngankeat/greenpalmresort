<div class="row layout-top-spacing">
    @section("breadcrumbs")
        <nav class="breadcrumb-style-one" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("dashboard.index") }}"><i data-lucide="home"></i> {{ __("menus.sidebar.home") }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route("modules.index") }}">{{ __("menus.sidebar.role.pages") }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __("menus.sidebar.actions") }}</li>
            </ol>
        </nav>
    @endsection
    <div class="col-12">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>{{ __("menus.sidebar.role.pages") }}</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <div class="row">
                    <div class="col-4">
                        <div class="form-group mb-4">
                            <p>Route Name <code>*</code></p>
                            <label for="t-Route" class="visually-hidden">Route Name</label>
                            <label id="t-Route" class="form-control">{{ $page->default_action }}</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group mb-4">
                            <p>{{ __("label.form.pages") }} <code>*</code></p>
                            <label for="t-Pages" class="visually-hidden">{{ __("label.form.pages") }}</label>
                            <label id="t-Pages" class="form-control">{{$page->name}}</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group mb-4">
                            <p>{{ __("label.form.pages.kh") }} <code>*</code></p>
                            <label for="t-PagesKh" class="visually-hidden">{{ __("label.form.pages.kh") }}</label>
                            <label id="t-PagesKh" class="form-control">{{$page->name_kh}}</label>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>{{ __("label.table.th.no") }}</th>
                                        <th>Type</th>
                                        <th>Route Name</th>
                                        <th>{{ __("label.table.th.actions") }}</th>
                                        <th>{{ __("label.table.th.actions.kh") }}</th>
                                        <th>{{ __("label.table.th.order") }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $index = 1 @endphp
                                    @foreach($actionPages as $row)
                                    <tr>
                                        <td>{{ $index++ }}</td>
                                        <td>{{ $row->type }}</td>
                                        <td>{{ $row->route_name }}</td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->name_kh }}</td>
                                        <td>{{ $row->position }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-1"></div>
                    <div class="col-3">

                            <div class="form-group mb-4">
                                <p>Type <code>*</code></p>
                                <label for="t-Type" class="visually-hidden">Type</label>
                                <input  id="t-Type" type="text" class="form-control" wire:model="actionType" required placeholder="Type..." />
                            </div>
                            <div class="form-group mb-4">
                                <p>Route Name <code>*</code></p>
                                <label for="t-ActionsRoute" class="visually-hidden">Route Name</label>
                                <input  id="t-ActionsRoute" type="text" class="form-control" wire:model="routeName" required placeholder="Route Name" />
                            </div>
                            <div class="form-group mb-4">
                                <p>{{ __("label.form.actions") }} <code>*</code></p>
                                <label for="t-actionName" class="visually-hidden">{{ __("label.form.actions") }}</label>
                                <input  id="t-actionName" type="text" class="form-control" placeholder="{{ __("label.form.actions") }}" wire:model="actionName" required/>
                            </div>
                            <div class="form-group mb-4">
                                <p>{{ __("label.form.actions.kh") }} <code>*</code></p>
                                <label for="t-actionNameKh" class="visually-hidden">{{ __("label.form.actions.kh") }}</label>
                                <input  id="t-actionNameKh" type="text" class="form-control" placeholder="{{ __("label.form.actions.kh") }}" wire:model="actionNameKh" required/>
                            </div>
                            <div class="form-group mb-4">
                                <p>{{ __("label.form.modules.order") }} <code>*</code></p>
                                <label for="t-ModuleOrder" class="visually-hidden">{{ __("label.form.modules.order") }}</label>
                                <input id="t-ModuleOrder" type="text" name="txtModuleOrder" placeholder="{{ __("label.form.modules.order") }}" class="form-control" wire:model="order" required />
                            </div>
                            <button class="mt-4 mb-4 btn btn-primary" wire:click="saveAction">{{ __("label.button.save") }}</button>
                            <a href="{{ route("setups.pages.index") }}" wire:click="$set('routeName','')"  class="mt-4 mb-4 btn btn-warning">{{ __("label.button.back") }}</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
