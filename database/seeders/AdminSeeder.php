<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserRole;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create(
            ['firstname' => 'Admin', 'lastname' => 'Admin', 'password' => '$2y$10$k.cJb1S.pA9nxsRSpIKvu.IewRzQ.C24QTRWpTB7g5io5xYkDeVma', 'country'=> 'Ukraine', 'phone' => '1234', 'birthdate' => '2002-11-11','email' => 'admin@example.com'] // password - 12345678
        );
        UserRole::create(['user_id' => $admin->id, 'role_id' => 1]);
    }
}
