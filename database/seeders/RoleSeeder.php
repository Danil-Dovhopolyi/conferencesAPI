<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(
            ['name' => 'Admin', 'role_id' => 1]
        );
        Role::create(
            ['name' => 'Confree', 'role_id' => 2]
        );
         Role::create(
            ['name' => 'Listener', 'role_id' => 3]
        );
    }
}
