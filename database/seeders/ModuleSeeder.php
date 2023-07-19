<?php

namespace Database\Seeders;

use App\Models\staff\module\Module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $table->id();
        // $table->string('name');
        // $table->string('description');
        // $table->timestamps();

        $module_1 = new Module();
        $module_1->name = 'Staff';
        $module_1->description = 'Staff Module';
        $module_1->save();
        
        $module_2 = new Module();
        $module_2->name = 'Patient';
        $module_2->description = 'Patient Module';
        $module_2->save();

        $module_3 = new Module();
        $module_3->name = 'Inventory';
        $module_3->description = 'Inventory Module';
        $module_3->save();

        $module_4 = new Module();
        $module_4->name = 'Subscription';
        $module_4->description = 'Subscription Module';
        $module_4->save();

        $module_5 = new Module();
        $module_5->name = 'User';
        $module_5->description = 'User Module';
        $module_5->save();

        $module_6 = new Module();
        $module_6->name = 'Role';
        $module_6->description = 'Role Module';
        $module_6->save();

        $module_7 = new Module();
        $module_7->name = 'Subscription Type';
        $module_7->description = 'Subscription Type Module';
        $module_7->save();

        $module_8 = new Module();
        $module_8->name = 'Role User';
        $module_8->description = 'Role User Module';
        $module_8->save();

        $module_9 = new Module();
        $module_9->name = 'Role Module';
        $module_9->description = 'Role Module Module';
        $module_9->save();

        $module_10 = new Module();
        $module_10->name = 'Module';
        $module_10->description = 'Module Module';
        $module_10->save();

        $module_11 = new Module();
        $module_11->name = 'Audit trail';
        $module_11->description = 'Audit trail Module';
        $module_11->save();

        $module_12 = new Module();
        $module_12->name = 'Employee';
        $module_12->description = 'Employee Module';
        $module_12->save();

        $module_13 = new Module();
        $module_13->name = 'Occupation';
        $module_13->description = 'Occupation Module';
        $module_13->save();



    }
}
