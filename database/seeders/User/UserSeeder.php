<?php

namespace Database\Seeders\User;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $user = new User();
        $user->name = 'user-8';
        $user->email = 'user8@gmail.com';
        $user->password = bcrypt('11111111');
        $user->save();


        $user = new User();
        $user->name = 'author-8';
        $user->email = 'author@gmail.com';
        $user->user_type = 'author';
        $user->kyc_status = 1;
        $user->password = bcrypt('11111111');
        $user->save();
    }
}
