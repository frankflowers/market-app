<x-admin-layout :breadcrumbs="[
    ['name' => 'Dashboard', 'href' => route('admin.dashboard')],
    ['name' => 'Roles', 'href' => route('admin.roles.index')],
    ['name' => 'Editar'],
]">
<<<<<<< HEAD

    <x-wire-card>
        <form action="{{ route('admin.roles.update', $role) }}" method="POST">
            @csrf
            @method('PUT')

            <x-wire-input
                label="Nombre"
                name="name"
                placeholder="Nombre del rol"
                value="{{ old('name', $role->name) }}"
            />

            <div class="flex justify-end mt-4">
                <x-wire-button type="submit" blue>
                    Actualizar
                </x-wire-button>
            </div>
        </form>
    </x-wire-card>

</x-admin-layout>
=======
<x-wire-card>
    <form action="{{route('admin.roles.update', $role)}}" method="POST">

@csrf
@method('PUT')
<x-wire-input label="Nombre" name="name" placeholder="Nombre de rol" value="{{old ('name', $role->name)}}">

</x-wire-input>
<div class="flex justify-end mt-4">
 <x-wire-button type="submit" bllue>Actualizar</x-wire-button>
</div>

</form> 

</x-wire-card>
</x-admin-layout>
>>>>>>> c0f97f450c60019401936b22d6e78c37cb6ecdbe
