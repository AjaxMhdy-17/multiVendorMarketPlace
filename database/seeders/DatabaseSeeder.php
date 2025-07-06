<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\Admin\AdminSeeder;
use Database\Seeders\Admin\RolePermissionSeeder;
use Database\Seeders\User\UserSeeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // $this->call([
        //     RolePermissionSeeder::class,
        //     AdminSeeder::class,
        //     UserSeeder::class,
        // ]);


        for ($i = 0; $i <= 1000; $i++) {
            if ($i != 8) {
                $user = new User();
                $user->name = 'user-' . $i;
                $user->email = 'user' . $i . '@gmail.com';
                $user->password = bcrypt('11111111');
                $user->save();
            }
        }
    }
}
