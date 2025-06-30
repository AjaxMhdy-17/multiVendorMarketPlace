<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Services\NotificationService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class RoleUserController extends Controller
{

    public function index()
    {
        $data['title'] = "User List";
        $data['admins'] = Admin::get();
        return view('admin.accessManagement.user.index', $data);
    }


    public function create()
    {
        $data['title'] = "User Create";
        $data['roles'] = Role::get();
        return view('admin.accessManagement.user.create', $data);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins,email',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|string|exists:roles,name',
        ]);
        $role = $data['role'];
        unset($data['role']);
        $data['password'] = bcrypt($data['password']);
        $adminInfo = Admin::create($data);
        $adminInfo->assignRole($role);
        NotificationService::CREATED("Admin User Created Successfully!");
        return redirect()->route('admin.roles.user.index');
    }



    public function edit(string $id)
    {
        $data['title'] = "User Edit";
        $data['roles'] = Role::get();
        $data['user_info'] = Admin::findOrFail($id);
        return view('admin.accessManagement.user.edit', $data);
    }


    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('admins', 'email')->ignore($id),
            ],
            'password' => 'sometimes|confirmed',
            'role' => 'sometimes|string|exists:roles,name',
        ]);

        $role = $data['role'];
        unset($data['role']);

        $adminInfo = Admin::findOrFail($id);
        $adminInfo->name = $data['name'];
        $adminInfo->email = $data['email'];


        if (!empty($data['password'])) {
            $adminInfo->password = bcrypt($data['password']);
        }
        $adminInfo->save();
        $adminInfo->assignRole($role);
        NotificationService::UPDATED("Admin User Updated Successfully!");
        return redirect()->route('admin.roles.user.index');
    }


    public function destroy(string $id)
    {
        $adminInfo = Admin::findOrFail($id);
        if (count($adminInfo->getRoleNames()) > 0) {
            foreach ($adminInfo->getRoleNames() as $role) {
                $adminInfo->removeRole($role);
            }
        }
        $adminInfo->delete();
        NotificationService::DELETED("Admin User Deleted Successfully!");
        return redirect()->route('admin.roles.user.index');
    }
}
