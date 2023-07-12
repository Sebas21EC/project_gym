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
        Schema::create('permissions', function (Blueprint $table) {
                
                $table->increments('id'); // This is the primary key
                $table->boolean('create')->default(false);
                $table->boolean('read')->default(false);
                $table->boolean('update')->default(false);
                $table->boolean('delete')->default(false);
              
            //fk de role
                $table->foreignId('role_id')->constrained('roles')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
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
