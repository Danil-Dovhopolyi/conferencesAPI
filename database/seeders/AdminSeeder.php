<?php

namespace Database\Seeders;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $user = User::create(
            ['firstname' => 'Admin', 'lastname' => 'Admin', 'password' => '$2y$10$k.cJb1S.pA9nxsRSpIKvu.IewRzQ.C24QTRWpTB7g5io5xYkDeVma', 'country'=> 'Ukraine', 'email' => 'admin@groupbwt.com'] // password - 12345678
        );
       $user->assignRole('admin');

    }
}
