<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(['firstname' => 'Alex', 'lastname'=> 'Bondarenko', 'email' => 'admin@example.com', 'password' => '12345678', 'phone' => '12424', 'birthdate' => '2022-09-26', 'type' => '1', 'country' => 'Ukraine']);
    }
}
   