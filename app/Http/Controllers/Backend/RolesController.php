<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{
    public function index(){
        $roles = Role::all();
        return view('backend.pages.roles.index', compact('roles'));
    }
    public function create(){
        $permissions = Permission::all();
        return view('backend.pages.roles.create', compact('permissions'));
    }
    public function store(Request $request){
        Role::create(['name' => $request->name]);
        return back();
    }
}
