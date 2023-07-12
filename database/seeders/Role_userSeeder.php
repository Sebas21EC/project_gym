<?php

namespace Database\Seeders;

use App\Models\staff\role_user\Role_user;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Role_userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user_01 = new Role_user;
        $role_user_01-> role_id = 1;
        $role_user_01-> user_id = 1;
        $role_user_01->is_active = true;
        $role_user_01->save();

        $role_user_02 = new Role_user;
        $role_user_02-> role_id = 2;
        $role_user_02-> user_id = 2;
        $role_user_02->is_active = true;
        $role_user_02->save();

        $role_user_03 = new Role_user;
        $role_user_03-> role_id = 3;
        $role_user_03-> user_id = 3;
        $role_user_03->is_active = true;
        $role_user_03->save();

        $role_user_04 = new Role_user;
        $role_user_04-> role_id = 4;
        $role_user_04-> user_id = 4;
        $role_user_04->is_active = true;
        $role_user_04->save();
        

    }
}
