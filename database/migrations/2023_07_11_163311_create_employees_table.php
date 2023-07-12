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
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id'); // This is the primary key
            $table->string('identify',20)->unique();
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            // $table->string('employee_email', 100)->unique();
            $table->string('phone', 100)->nullable();
            $table->string('address', 100)->nullable();
            //fk de occupation
            $table->integer('occupation_id')->unsigned();
            $table->foreign('occupation_id')->references('id')->on('occupations');
            $table->timestamps();
        });

        DB::table('employees')->insert(
            array(
                'identify' => '123456789',
                'first_name' => 'Sebastian',
                'last_name' => 'Carlosama',
                // 'employee_email' => 'sebas@admin',
                'phone' => '123456789',
                'address' => 'Calle 123',
                'occupation_id' => 1,
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
        Schema::dropIfExists('employees');
    }
};
