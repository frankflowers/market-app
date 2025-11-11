<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('admin.roles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:roles,name',
        ]);

        Role::create([
            'name' => $validated['name'],
        ]);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Éxito',
            'text' => 'Rol creado correctamente.',
        ]);

        return redirect()->route('admin.roles.index');
    }

    public function show(Role $role)
    {
        return view('admin.roles.show', compact('role'));
    }

    public function edit(Role $role)
    {
        // 🚫 Evitar edición de los primeros 9 roles
        if ($role->id <= 9) {
            session()->flash('swal', [
                'icon' => 'error',
                'title' => 'Acción no permitida',
                'text' => 'Este rol no puede ser editado.',
            ]);

            return redirect()->route('admin.roles.index');
        }

        return view('admin.roles.edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        // 🚫 Evitar actualización de los primeros 9 roles
        if ($role->id <= 9) {
            session()->flash('swal', [
                'icon' => 'error',
                'title' => 'Acción no permitida',
                'text' => 'Este rol no puede ser modificado.',
            ]);

            return redirect()->route('admin.roles.index');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $role->id,
        ]);

        // ✅ Verificar si hubo cambios
        if ($role->name === $validated['name']) {
            session()->flash('swal', [
                'icon' => 'info',
                'title' => 'Sin cambios',
                'text' => 'No se detectaron modificaciones en el rol.',
            ]);

            return redirect()->back();
        }

        $role->update(['name' => $validated['name']]);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Actualizado',
            'text' => 'El rol se actualizó correctamente.',
        ]);

        return redirect()->route('admin.roles.index');
    }

    public function destroy(Role $role)
    {
        // 🚫 Evitar eliminación de los primeros 9 roles
        if ($role->id <= 9) {
            session()->flash('swal', [
                'icon' => 'error',
                'title' => 'Acción no permitida',
                'text' => 'Este rol es esencial y no puede eliminarse.',
            ]);

            return redirect()->route('admin.roles.index');
        }

        $role->delete();

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Eliminado',
            'text' => 'El rol fue eliminado correctamente.',
        ]);

        return redirect()->route('admin.roles.index');
    }
}
