<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    //

    public function index () {
        return view('admin.roles.index', ['roles'=>Role::all()]);
    }

    public function store () {
        
        request()->validate([
            'name' => ['required']
        ]);

        Role::create([
            'name' => ucfirst(request('name')),
            'slug' => Str::of(strtolower(request('name')))->slug('-'),
        ]);

        return back();
    }
}
