<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [ 
            'conference_create',
            'conference_edit',
            'conference_show',
            'conference_delete',
        ];
        
        
        foreach ($permissions as $permission)   {
            Permission::create([
                'name' => $permission
            ]);
            
            $role = Role::findByName('admin');
            $role->givePermissionTo($permission);
        }
        $listener = Role::findByName('listener');
        $listener->givePermissionTo('conference_show');

        $conferee = Role::findByName('conferee');
        $conferee->givePermissionTo('conference_show');
        $conferee->givePermissionTo('conference_create');
    }
}
