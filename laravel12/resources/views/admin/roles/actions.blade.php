<div class="flex items-center space-x-2">
    {{-- Botón Editar --}}
    <x-wire-button href="{{ route('admin.roles.edit', $role) }}" blue xs>
        <i class="fa-solid fa-pen-to-square"></i>
    </x-wire-button>

    {{-- Botón Eliminar con SweetAlert2 --}}
    <form action="{{ route('admin.roles.destroy', $role) }}" method="POST" class="form-delete">
        @csrf
        @method('DELETE')
        <x-wire-button type="submit" red xs>
            <i class="fa-solid fa-trash"></i>
        </x-wire-button>
    </form>
</div>
