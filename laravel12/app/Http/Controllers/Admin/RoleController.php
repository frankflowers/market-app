<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.roles.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // ✅ Validar los datos
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:roles,name',
            'description' => 'nullable|string|max:1000',
        ]);

        // ✅ Crear el rol usando Spatie
        $role = Role::create([
            'name' => $validated['name'],
        ]);

        //variable de un solo uso
        session()->flash('swal', 
            [
                'icon' => 'success',
                'title' => 'Éxito',
                'text' => 'Rol creado correctamente.'
            ]
        );

     
        // ✅ Redireccionar con mensaje de éxito
        return redirect()
            ->route('admin.roles.index')
            ->with('success', 'Rol creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        return view('admin.roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        return view('admin.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $role->id,
            'description' => 'nullable|string|max:1000',
        ]);

        $role->update(['name' => $validated['name']]);

        if (isset($validated['description'])) {
            $role->description = $validated['description'];
            $role->save();
        }

        return redirect()
            ->route('admin.roles.index')
            ->with('success', 'Rol actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()
            ->route('admin.roles.index')
            ->with('success', 'Rol eliminado correctamente.');
    }
}
