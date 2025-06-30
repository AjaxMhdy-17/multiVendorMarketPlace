<?php

namespace Database\Seeders\Admin;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $admin = new Admin();
        $admin->name = 'Super Admin';
        $admin->email = 'admin@gmail.com';
        $admin->password = bcrypt('11111111');
        $admin->save();
        $admin->assignRole('super admin');


        $reviewer = new Admin();
        $reviewer->name = 'Reviewer';
        $reviewer->email = 'reviewer@gmail.com';
        $reviewer->password = bcrypt('11111111');
        $reviewer->save();
        $reviewer->assignRole('reviewer');
    }
}
