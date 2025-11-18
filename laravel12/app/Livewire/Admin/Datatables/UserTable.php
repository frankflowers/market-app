<?php

namespace App\Livewire\Admin\Datatables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Illuminate\Database\Eloquent\Builder; // <-- ESTA ES LA IMPORTANTE
use App\Models\User;

class UserTable extends DataTableComponent
{
    public function builder(): Builder
    {
        return User::query()->with('roles');
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),

            Column::make("Nombre", "name")
                ->sortable(),

            Column::make("Email", "email")
                ->sortable(),

            Column::make("Numero de iD", "id_number")
                ->sortable(),

            Column::make("Telefono", "phone")
                ->sortable(),

            Column::make("Rol", "Roles")
                ->label(function ($row) {
                    return $row->roles->first()?->name ?? 'Sin Rol';
                }),

            Column::make("Acciones")
                ->label(function ($row) {
                    return view('admin.users.actions', ['user'=> $row]);
                }),
        ];
    }
}
