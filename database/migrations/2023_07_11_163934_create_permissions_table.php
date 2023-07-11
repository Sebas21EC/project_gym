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
        Schema::create('permissions', function (Blueprint $table) {
                
                $table->increments('id'); // This is the primary key
                $table->string('name');
            //fk de role
                $table->integer('role_id')->unsigned();
                $table->foreign('role_id')->references('id')->on('roles');
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
        Schema::dropIfExists('permissions');
    }
};
