<?php

namespace Database\Seeders;

use App\Models\staff\permission\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Permission::factory()->count(10)->create();


        $permission_01 = new Permission;
        $permission_01-> create = true;
        $permission_01-> read = true;
        $permission_01-> update = true;
        $permission_01-> delete = true;
        $permission_01->role_id = 1;
        $permission_01->created_at = '2021-07-12 01:28:41';
        $permission_01->updated_at = '2021-07-12 01:28:41';
        $permission_01->save();

        $permission_02 = new Permission;
        $permission_02-> create = true;
        $permission_02-> read = true;
        $permission_02-> update = true;
        $permission_02-> delete = true;
        $permission_02->role_id = 2;
        $permission_01->created_at = '2021-07-12 01:28:41';
        $permission_01->updated_at = '2021-07-12 01:28:41';
        $permission_02->save();
        
        $permission_03 = new Permission;
        $permission_03-> create = true;
        $permission_03-> read = true;
        $permission_03-> update = true;
        $permission_03-> delete = true;
        $permission_03->role_id = 3;
        $permission_01->created_at = '2021-07-12 01:28:41';
        $permission_01->updated_at = '2021-07-12 01:28:41';
        $permission_03->save();

        $permission_04 = new Permission;
        $permission_04-> create = true;
        $permission_04-> read = true;
        $permission_04-> update = true;
        $permission_04-> delete = true;
        $permission_04->role_id = 4;
        $permission_01->created_at = '2021-07-12 01:28:41';
        $permission_01->updated_at = '2021-07-12 01:28:41';
        $permission_04->save();



    }
}
