<?php

namespace Database\Seeders;

use App\Models\staff\role_user\Role_user;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Role_userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
        DB::table('role_user')->insert([
            'role_id' => 1,
            'user_id' => 1,
            'is_active' => true,
            'created_at' => '2021-07-12 01:28:41',
            'updated_at' => '2021-07-12 01:28:41',
        ]);

        DB::table('role_user')->insert([
            'role_id' => 2,
            'user_id' => 2,
            'is_active' => true,
            'created_at' => '2021-07-12 01:28:41',
            'updated_at' => '2021-07-12 01:28:41',
        ]);

        DB::table('role_user')->insert([
            'role_id' => 3,
            'user_id' => 3,
            'is_active' => true,
            'created_at' => '2021-07-12 01:28:41',
            'updated_at' => '2021-07-12 01:28:41',
        ]);

        DB::table('role_user')->insert([
            'role_id' => 4,
            'user_id' => 4,
            'is_active' => true,
            'created_at' => '2021-07-12 01:28:41',
            'updated_at' => '2021-07-12 01:28:41',
        ]);

    }
}
