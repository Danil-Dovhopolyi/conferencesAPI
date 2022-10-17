<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
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
      Role::create(['guard_name' => 'api', 'name' => 'admin']);
      Role::create(['guard_name' => 'api', 'name' => 'conferee']);
      Role::create(['guard_name' => 'api', 'name' => 'listener']);
    }
}
