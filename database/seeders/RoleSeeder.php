<?php

namespace Database\Seeders;

use App\Models\staff\role\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {



        $role_01 = new Role;
        $role_01->role_name= 'administrator';
        $role_01->is_active = true;
        $role_01->save();

        $role_02 = new Role;
        $role_02->role_name = 'auditor';
        $role_02->is_active = true;
        $role_02->save();

        $role_03 = new Role;
        $role_03->role_name = 'user';
        $role_03->is_active = true;
        $role_03->save();

        $role_04 = new Role;
        $role_04->role_name = 'operator';
        $role_04->is_active = true;
        $role_04->save();



        // Role::factory()->count(10)->create();
    }
}
