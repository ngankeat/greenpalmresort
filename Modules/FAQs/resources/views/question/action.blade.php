<div class="list-icons">
    <div class="dropdown">

        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink{{ $module->id }}" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            <i data-lucide="more-horizontal"></i>
        </a>

        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink{{ $module->id }}">

            @if (is_null($module->deleted_at))
                @isset($pageActions['action'])
                    @foreach($pageActions['action'] as $action)
                        @if($action['action_type'] == 'view')
                            <a class="dropdown-item" href="{{ route("faqs.question.view", $module->id) }}"><i data-lucide="eye"></i> {{ __("label.button.view") }}</a>
                        @endif
                        @if($action['action_type'] == 'edit')
                            <a class="dropdown-item" href="{{ route("faqs.question.edit", $module->id) }}"><i data-lucide="pencil-ruler"></i> {{ __("label.button.edit") }}</a>
                        @endif
                        @if($action['action_type'] == 'delete')
                                <a class="dropdown-item" href="#" onclick="confirm('{{ route("faqs.question.destroy", $module->id) }}', 1)"><i data-lucide="trash-2"></i> {{ __("label.button.delete") }}</a>
                        @endif
                    @endforeach
                @endisset
            @else
                @isset($pageActions['action'])
                    @foreach($pageActions['action'] as $action)
                        @if ($action['action_type'] == 'restore')
                            <a class="dropdown-item" href="#" onclick="confirm('{{ route("faqs.question.restore", $module->id) }}', 2)"><i data-lucide="undo-2"></i> {{ __("label.button.get.back") }}</a>
                        @endif
                    @endforeach
                @endisset
            @endif
        </div>
    </div>
</div>
