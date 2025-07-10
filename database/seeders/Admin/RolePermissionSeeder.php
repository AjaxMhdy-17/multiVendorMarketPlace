<?php

namespace Database\Seeders\Admin;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {

        $this->createDefaultPermissionRoles();

        $admin = new Role();
        $admin->name = 'super admin';
        $admin->guard_name = 'admin';
        $admin->save();


        $reviewer = new Role();
        $reviewer->name = 'reviewer';
        $reviewer->guard_name = 'admin';
        $reviewer->save();

        $reviewer->givePermissionTo('review products');
    }


    public function createDefaultPermissionRoles()
    {
        Permission::insert([
            [
                "name" => 'review products',
                "guard_name" => 'admin',
                "group_name" => 'review products',
            ],
            [
                "name" => 'manage categories',
                "guard_name" => 'admin',
                "group_name" => 'category manage',
            ],
        ]);
    }
}
