<?php

namespace App\Http\Controllers;

use App\Models\Permission;
//use App\Models\Role;
use App\Models\RoleHasPermission;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('permission:view roles');
    }

    public function index()
    {
        $roles =Role::with('permissions')->get();
        return view('admin.pages.role.index', compact('roles'));
    }

    public function editRole(Role $role)
    {
        $permissions = Permission::get();
        return view('admin.pages.role.edit', compact('role','permissions'));
    }

    public function update(Request $request)
    {
        $validationRules = [
            'permissions' => 'required|array',
            'role_id' => 'required'
        ];

        $request->validate($validationRules);

        $permissions = $request->permissions;
        $role = Role::findOrFail($request->role_id);
        $role->syncPermissions($permissions);

        return redirect()->route('roles')->with('success', 'Role Item updated successfully');

    }

}
