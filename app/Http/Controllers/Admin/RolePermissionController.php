<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Services\NotificationService;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class RolePermissionController extends Controller
{
    public function index()
    {
        $data['title'] = "Role Permissions List";
        $data['roles'] = Role::withCount('permissions')->get();
        return view('admin.accessManagement.role.index', $data);
    }

    public function create()
    {
        $data['title'] = "Role Permissions Create";
        $data['permissions'] = Permission::all()->groupBy('group_name');
        return view('admin.accessManagement.role.create', $data);
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        $save = [
            'guard_name' => 'admin',
            'name' => $data['role_name']
        ];
        $role = Role::create($save);
        $role->syncPermissions($data['permissions']);
        NotificationService::CREATED();
        return back();
    }

    public function edit(Role $role)
    {
        $data['title'] = "Role Permissions Edit";

        dd($role);

        $data['roles'] = $role;
        $data['permissions'] = Permission::all()->groupBy('group_name');

        dd($data['roles']);

        return view('admin.accessManagement.role.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'role_name' => [
                'required',
                'max:80',
                Rule::unique('roles', 'name')->ignore($id),
            ],
            'permissions' => 'required|array'
        ]);
        $role = Role::findOrFail($id);
        $role->name = $data['role_name'];
        $role->save();
        $role->syncPermissions($data['permissions']);
        NotificationService::UPDATED();
        return back();
    }


    public function destroy(string $id)
    {
        $role = Role::findOrFail($id);

        DB::beginTransaction();
        $role->permissions()->detach();
        $role->delete();
        DB::commit();
        NotificationService::DELETED('Role Has Been Deleted Successfully!');
        return back();
    }

    public function validateData($request)
    {
        return $request->validate([
            'role_name' => 'required|string|max:255',
            'permissions' => 'required|array',
        ]);
    }
}
