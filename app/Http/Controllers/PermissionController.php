<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Support\Str;

class PermissionController extends Controller
{
    //
    public function index () {
        return view('admin.permissions.index', ['permissions' => Permission::all()]);
    }

    public function store()
    {

        request()->validate([
            'name' => ['required']
        ]);

        Permission::create([
            'name' => ucfirst(request('name')),
            'slug' => Str::of(strtolower(request('name')))->slug('-'),
        ]);
        session()->flash('created', 'Role Created');

        return back();
    }

    public function edit(Permission $permission)
    {
        return view('admin.permissions.edit', ['permission' => $permission]);
    }

}
