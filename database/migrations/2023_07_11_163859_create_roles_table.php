<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('role_name', 50)->unique()->unique();
            $table->string('is_active', 50)->default(true);
            $table->timestamps();
        });



        // $roles = [
        //     [
        //         'role_name' => 'administrator',
        //     ],
        //     [
        //         'role_name' => 'operator',
        //     ],
        //     [
        //         'role_name' => 'auditor',
        //     ],
        //     [
        //         'role_name' => 'user',
        //     ],
            
        // ];

        // // Insert roles
        // DB::table('roles')->insert($roles);


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
};
