<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
            $table->string('identity',20)->unique();
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
