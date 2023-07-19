<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $table->id();
        // $table->foreignId('role_id')->constrained('role');
        // $table->foreignId('module_id')->constrained('module');
        // $table->boolean('create')->default(false);
        // $table->boolean('read')->default(false);
        // $table->boolean('update')->default(false);
        // $table->boolean('delete')->default(false);
        // $table->timestamps();


        //roles
        // $role_01 = new Role;
        // $role_01->role_name= 'administrator';
        // $role_01->is_active = true;
        // $role_01->save();

        // $role_02 = new Role;
        // $role_02->role_name = 'auditor';
        // $role_02->is_active = true;
        // $role_02->save();

        // $role_03 = new Role;
        // $role_03->role_name = 'user';
        // $role_03->is_active = true;
        // $role_03->save();

        // $role_04 = new Role;
        // $role_04->role_name = 'operator';
        // $role_04->is_active = true;
        // $role_04->save();


        //modules
        
        // $module_1 = new Module();
        // $module_1->name = 'Staff';
        // $module_1->description = 'Staff Module';
        // $module_1->save();
        
        // $module_2 = new Module();
        // $module_2->name = 'Patient';
        // $module_2->description = 'Patient Module';
        // $module_2->save();

        // $module_3 = new Module();
        // $module_3->name = 'Inventory';
        // $module_3->description = 'Inventory Module';
        // $module_3->save();

        // $module_4 = new Module();
        // $module_4->name = 'Subscription';
        // $module_4->description = 'Subscription Module';
        // $module_4->save();

        // $module_5 = new Module();
        // $module_5->name = 'User';
        // $module_5->description = 'User Module';
        // $module_5->save();

        // $module_6 = new Module();
        // $module_6->name = 'Role';
        // $module_6->description = 'Role Module';
        // $module_6->save();

        // $module_7 = new Module();
        // $module_7->name = 'Subscription Type';
        // $module_7->description = 'Subscription Type Module';
        // $module_7->save();

        // $module_8 = new Module();
        // $module_8->name = 'Role User';
        // $module_8->description = 'Role User Module';
        // $module_8->save();

        // $module_9 = new Module();
        // $module_9->name = 'Role Module';
        // $module_9->description = 'Role Module Module';
        // $module_9->save();

        // $module_10 = new Module();
        // $module_10->name = 'Module';
        // $module_10->description = 'Module Module';
        // $module_10->save();

        // $module_11 = new Module();
        // $module_11->name = 'Audit trail';
        // $module_11->description = 'Audit trail Module';
        // $module_11->save();

        // $module_12 = new Module();
        // $module_12->name = 'Employee';
        // $module_12->description = 'Employee Module';
        // $module_12->save();

        // $module_13 = new Module();
        // $module_13->name = 'Occupation';
        // $module_13->description = 'Occupation Module';
        // $module_13->save();


        DB::table('module_role')->insert([
            'role_id' => 1,
            'module_id' => 1,
            'create' => true,
            'read' => true,
            'update' => true,
            'delete' => true,
            'created_at' => '2021-07-12 01:28:41',
            'updated_at' => '2021-07-12 01:28:41',

        ]);

        DB::table('module_role')->insert([
            'role_id' => 1,
            'module_id' => 2,
            'create' => true,
            'read' => true,
            'update' => true,
            'delete' => true,
            'created_at' => '2021-07-12 01:28:41',
            'updated_at' => '2021-07-12 01:28:41',
            
        ]);

        DB::table('module_role')->insert([
            'role_id' => 1,
            'module_id' => 3,
            'create' => true,
            'read' => true,
            'update' => true,
            'delete' => true,
            'created_at' => '2021-07-12 01:28:41',
            'updated_at' => '2021-07-12 01:28:41',
            
        ]);

        DB::table('module_role')->insert([
            'role_id' => 1,
            'module_id' => 4,
            'create' => true,
            'read' => true,
            'update' => true,
            'delete' => true,
            'created_at' => '2021-07-12 01:28:41',
            'updated_at' => '2021-07-12 01:28:41',
            
        ]);

        DB::table('module_role')->insert([
            'role_id' => 1,
            'module_id' => 5,
            'create' => true,
            'read' => true,
            'update' => true,
            'delete' => true,
            'created_at' => '2021-07-12 01:28:41',
            'updated_at' => '2021-07-12 01:28:41',
            
        ]);

        DB::table('module_role')->insert([
            'role_id' => 1,
            'module_id' => 6,
            'create' => true,
            'read' => true,
            'update' => true,
            'delete' => true,
            'created_at' => '2021-07-12 01:28:41',
            'updated_at' => '2021-07-12 01:28:41',
            
        ]);

        DB::table('module_role')->insert([
            'role_id' => 1,
            'module_id' => 7,
            'create' => true,
            'read' => true,
            'update' => true,
            'delete' => true,
            'created_at' => '2021-07-12 01:28:41',
            'updated_at' => '2021-07-12 01:28:41',
            
        ]);

        DB::table('module_role')->insert([
            'role_id' => 1,
            'module_id' => 8,
            'create' => true,
            'read' => true,
            'update' => true,
            'delete' => true,
            'created_at' => '2021-07-12 01:28:41',
            'updated_at' => '2021-07-12 01:28:41',
            
        ]);

        DB::table('module_role')->insert([
            'role_id' => 1,
            'module_id' => 9,
            'create' => true,
            'read' => true,
            'update' => true,
            'delete' => true,
            'created_at' => '2021-08-12 01:28:41',
            'updated_at' => '2021-08-12 01:28:41',
            
        ]);

        DB::table('module_role')->insert([
            'role_id' => 1,
            'module_id' => 10,
            'create' => true,
            'read' => true,
            'update' => true,
            'delete' => true,
            'created_at' => '2022-07-12 01:28:41',
            'updated_at' => '2022-07-12 01:28:41',
            
        ]);

        DB::table('module_role')->insert([
            'role_id' => 1,
            'module_id' => 11,
            'create' => false,
            'read' => true,
            'update' => false,
            'delete' => false,
            'created_at' => '2022-07-12 01:28:41',
            'updated_at' => '2022-07-12 01:28:41',
            
        ]);

        DB::table('module_role')->insert([
            'role_id' => 1,
            'module_id' => 12,
            'create' => false,
            'read' => true,
            'update' => false,
            'delete' => false,
            'created_at' => '2022-07-12 01:28:41',
            'updated_at' => '2022-07-12 01:28:41',
            
        ]);

        DB::table('module_role')->insert([
            'role_id' => 1,
            'module_id' => 13,
            'create' => false,
            'read' => true,
            'update' => false,
            'delete' => false,
            'created_at' => '2022-07-12 01:28:41',
            'updated_at' => '2022-07-12 01:28:41',
            
        ]);

       //EL AUDITOR SOLO AL MODULO AUDIT TRAILR

        DB::table('module_role')->insert([
            'role_id' => 2,
            'module_id' => 11,
            'create' => false,
            'read' => true,
            'update' => false,
            'delete' => false,
            'created_at' => '2022-07-12 01:28:41',
            'updated_at' => '2022-07-12 01:28:41',
            
        ]);

        //EL user a todos los modules excepto a los modulos de role, user, audit trail, role user, role module, module,employee, occupation

        DB::table('module_role')->insert([
            'role_id' => 3,
            'module_id' => 1,
            'create' => false,
            'read' => true,
            'update' => false,
            'delete' => false,
            'created_at' => '2022-07-12 01:28:41',
            'updated_at' => '2022-07-12 01:28:41',
            
        ]);

        DB::table('module_role')->insert([
            'role_id' => 3,
            'module_id' => 2,
            'create' => false,
            'read' => true,
            'update' => false,
            'delete' => false,
            'created_at' => '2022-07-12 01:28:41',
            'updated_at' => '2022-07-12 01:28:41',
            
        ]);

        DB::table('module_role')->insert([
            'role_id' => 3,
            'module_id' => 3,
            'create' => false,
            'read' => true,
            'update' => false,
            'delete' => false,
            'created_at' => '2022-07-12 01:28:41',
            'updated_at' => '2022-07-12 01:28:41',

        ]);

        DB::table('module_role')->insert([
            'role_id' => 3,
            'module_id' => 4,
            'create' => false,
            'read' => true,
            'update' => false,
            'delete' => false,
            'created_at' => '2022-07-12 01:28:41',
            'updated_at' => '2022-07-12 01:28:41',

        ]);

        DB::table('module_role')->insert([
            'role_id' => 3,
            'module_id' => 5,
            'create' => false,
            'read' => true,
            'update' => false,
            'delete' => false,
            'created_at' => '2022-07-12 01:28:41',
            'updated_at' => '2022-07-12 01:28:41',

        ]);

        DB::table('module_role')->insert([
            'role_id' => 3,
            'module_id' => 6,
            'create' => false,
            'read' => false,
            'update' => false,
            'delete' => false,
            'created_at' => '2022-07-12 01:28:41',
            'updated_at' => '2022-08-12 01:28:41',

        ]);

        DB::table('module_role')->insert([
            'role_id' => 3,
            'module_id' => 7,
            'create' => false,
            'read' => false,
            'update' => false,
            'delete' => false,
            'created_at' => '2022-07-12 01:28:41',
            'updated_at' => '2022-08-12 01:28:41',

        ]);

        DB::table('module_role')->insert([
            'role_id' => 3,
            'module_id' => 8,
            'create' => false,
            'read' => false,
            'update' => false,
            'delete' => false,
            'created_at' => '2022-07-12 01:28:41',
            'updated_at' => '2022-08-12 01:28:41',

        ]);

        DB::table('module_role')->insert([
            'role_id' => 3,
            'module_id' => 9,
            'create' => false,
            'read' => false,
            'update' => false,
            'delete' => false,
            'created_at' => '2022-08-12 01:28:41',
            'updated_at' => '2022-08-12 01:28:41',

        ]);

        DB::table('module_role')->insert([
            'role_id' => 3,
            'module_id' => 10,
            'create' => false,
            'read' => false,
            'update' => false,
            'delete' => false,
            'created_at' => '2022-08-12 01:28:41',
            'updated_at' => '2022-08-12 01:28:41',

        ]);

        DB::table('module_role')->insert([
            'role_id' => 3,
            'module_id' => 11,
            'create' => false,
            'read' => true,
            'update' => false,
            'delete' => false,
            'created_at' => '2022-08-12 01:28:41',
            'updated_at' => '2022-08-12 01:28:41',

        ]);

        DB::table('module_role')->insert([
            'role_id' => 3,
            'module_id' => 12,
            'create' => false,
            'read' => true,
            'update' => false,
            'delete' => false,
            'created_at' => '2022-08-12 01:28:41',
            'updated_at' => '2022-08-12 01:28:41',

        ]);

        DB::table('module_role')->insert([
            'role_id' => 3,
            'module_id' => 13,
            'create' => false,
            'read' => true,
            'update' => false,
            'delete' => false,
            'created_at' => '2022-08-12 01:28:41',
            'updated_at' => '2022-08-12 01:28:41',

        ]);

        //EL OPERATOR A TODOS LOS MODULES EXCEPTO A LOS MODULOS DE ROLE, USER, AUDIT TRAIL, ROLE USER, ROLE MODULE, MODULE, EMPLOYEE, OCCUPATION, PEROE ESTE PUEDE CREAR Y ACTUALIZAR

        DB::table('module_role')->insert([
            'role_id' => 4,
            'module_id' => 1,
            'create' => true,
            'read' => true,
            'update' => true,
            'delete' => false,
            'created_at' => '2022-08-12 01:28:41',
            'updated_at' => '2022-08-12 01:28:41',

        ]);

        DB::table('module_role')->insert([
            'role_id' => 4,
            'module_id' => 2,
            'create' => true,
            'read' => true,
            'update' => true,
            'delete' => false,
            'created_at' => '2022-08-12 01:28:41',
            'updated_at' => '2022-08-12 01:28:41',

        ]);

        DB::table('module_role')->insert([
            'role_id' => 4,
            'module_id' => 3,
            'create' => true,
            'read' => true,
            'update' => true,
            'delete' => false,
            'created_at' => '2022-08-12 01:28:41',
            'updated_at' => '2022-08-12 01:28:41',

        ]);

        DB::table('module_role')->insert([
            'role_id' => 4,
            'module_id' => 4,
            'create' => true,
            'read' => true,
            'update' => true,
            'delete' => false,
            'created_at' => '2022-08-12 01:28:41',
            'updated_at' => '2022-09-12 01:28:41',

        ]);

        DB::table('module_role')->insert([
            'role_id' => 4,
            'module_id' => 5,
            'create' => true,
            'read' => true,
            'update' => true,
            'delete' => false,
            'created_at' => '2022-09-12 01:28:41',
            'updated_at' => '2022-09-12 01:28:41',

        ]);

        DB::table('module_role')->insert([
            'role_id' => 4,
            'module_id' => 6,
            'create' => false,
            'read' => false,
            'update' => false,
            'delete' => false,
            'created_at' => '2022-09-12 01:28:41',
            'updated_at' => '2022-09-12 01:28:41',

        ]);

        DB::table('module_role')->insert([
            'role_id' => 4,
            'module_id' => 7,
            'create' => false,
            'read' => false,
            'update' => false,
            'delete' => false,
            'created_at' => '2022-09-12 01:28:41',
            'updated_at' => '2022-09-12 01:28:41',

        ]);

        DB::table('module_role')->insert([
            'role_id' => 4,
            'module_id' => 8,
            'create' => false,
            'read' => false,
            'update' => false,
            'delete' => false,
            'created_at' => '2022-09-12 01:28:41',
            'updated_at' => '2022-09-12 01:28:41',

        ]);

        DB::table('module_role')->insert([
            'role_id' => 4,
            'module_id' => 9,
            'create' => false,
            'read' => false,
            'update' => false,
            'delete' => false,
            'created_at' => '2022-09-12 01:28:41',
            'updated_at' => '2022-09-12 01:28:41',

        ]);

        DB::table('module_role')->insert([
            'role_id' => 4,
            'module_id' => 10,
            'create' => false,
            'read' => false,
            'update' => false,
            'delete' => false,
            'created_at' => '2022-09-12 01:28:41',
            'updated_at' => '2022-09-12 01:28:41',

        ]);

        


       

        
    }
}
