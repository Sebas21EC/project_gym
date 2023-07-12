<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::factory()->count(10)->create();
         // DB::table('users')->insert(
        //     array(
        //         'name' => 'admin',
        //         'email' => 'sebas@admin.com',
        //         'password' => bcrypt('admin'),
        //         'employee_id' => 1,
        //     )
        // );


        $user_01 = new User;
        $user_01->name = 'admin';
        $user_01->email = 'admin@admin';
        $user_01->password = bcrypt('admin');
        $user_01->employee_id = 1;
        $user_01->save();


        $user_02 = new User;
        $user_02->name = 'auditor';
        $user_02->email = 'auditor@auditor';
        $user_02->password = bcrypt('auditor');
        $user_02->employee_id = 2;
        $user_02->save();

        $user_03 = new User;
        $user_03->name = 'user';
        $user_03->email = 'user@user';
        $user_03->password = bcrypt('user');
        $user_03->employee_id = 3;
        $user_03->save();

        $user_04 = new User;
        $user_04->name = 'operator';
        $user_04->email = 'operator@operator';
        $user_04->password = bcrypt('operator');
        $user_04->employee_id = 4;
        $user_04->save();
        

    }
}
