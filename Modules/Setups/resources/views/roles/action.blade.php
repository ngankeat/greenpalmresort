<div class="list-icons">
    <div class="dropdown">
        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink{{ $module->id }}" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            <i data-lucide="more-horizontal"></i>
        </a>

        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink{{ $module->id }}">
            @if (is_null($module->deleted_at))
                <a class="dropdown-item" href="{{ route("setups.roles.edit", $module->id) }}"><i data-lucide="pencil-ruler"></i> {{ __("label.button.edit") }}</a>
                <a class="dropdown-item" href="#" onclick="confirm('{{ route("setups.roles.destroy", $module->id) }}', 1)"><i data-lucide="trash-2"></i> {{ __("label.button.delete") }}</a>
            @else
                <a class="dropdown-item" href="#" onclick="confirm('{{ route("setups.roles.restore", $module->id) }}', 2)"><i data-lucide="undo-2"></i> {{ __("label.button.get.back") }}</a>
            @endif
        </div>
    </div>
</div>
