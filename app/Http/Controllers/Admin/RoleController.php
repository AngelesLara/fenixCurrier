<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    public function index()
    {
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'

        ]);

        $role = Role::create($request->all());

        $role->permissions()->sync($request->permissions);

        return redirect()->route('admin.roles.edit', $role)->with('info', 'El rol se creo con exito!.');
    }

    public function edit($id)
    {
        $permissions = Permission::all();
        $roles = Role::find($id);
        return view('roles.edit', compact('roles', 'permissions'));
    }

    public function update(Request $request, Role $role){

        $request->validate([
            'name' => 'required'

        ]);

        $role->update($request->all());

        $role->permissions()->sync($request->permissions);

        return redirect()->route('admin.roles.edit', $role)->with('info', 'El rol se ha actualizado con exito!.');
    }

    public function destroy(Role $role){
        $role->delete();
        return redirect()->route('admin.roles.index', $role)->with('info', 'El rol se ha eliminado con exito!.');
    }
}
