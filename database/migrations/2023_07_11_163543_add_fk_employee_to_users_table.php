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
        Schema::table('users', function (Blueprint $table) {
            //
            $table -> integer('employee_id')->unsigned();
            $table -> foreign('employee_id')->references('id')->on('employees');
        });



        DB::table('users')->insert(
            array(
                'name' => 'admin',
                'email' => 'sebas@admin.com',
                'password' => bcrypt('admin'),
                'employee_id' => 1,
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
                $table -> dropForeign(['employee_id']);
                $table -> dropColumn('employee_id');
        });
    }
};
