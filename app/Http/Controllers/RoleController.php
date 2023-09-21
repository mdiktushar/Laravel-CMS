<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    //

    public function index()
    {
        return view('admin.roles.index', ['roles' => Role::all()]);
    }

    public function store()
    {

        request()->validate([
            'name' => ['required']
        ]);

        Role::create([
            'name' => ucfirst(request('name')),
            'slug' => Str::of(strtolower(request('name')))->slug('-'),
        ]);
        session()->flash('created', 'Role Created');

        return back();
    }

    public function edit(Role $role)
    {
        return view('admin.roles.edit', ['role' => $role, 'permissions' => Permission::all()]);
    }

    public function update(Role $role)
    {
        request()->validate([
            'name' => ['required']
        ]);

        $role->name = ucfirst(request('name'));
        $role->slug = Str::of(strtolower(request('name')))->slug('-');
        $role->save();

        session()->flash('updated', 'Role Updated');
        return redirect(route('roles.index'));
    }

    public function destroy(Role $role)
    {
        $role->delete();
        session()->flash('delete-message', 'Role Deleted');
        return back();
    }


    public function attach_permission (Role $role) {
        $role->permissions()->attach(request('permission'));
        return back();
    }

    public function detach_permission (Role $role) {
        $role->permissions()->detach(request('permission'));
        return back();
    }
}
