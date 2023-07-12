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
                $table->string('name');
            //fk de role
                $table->foreignId('role_id')->constrained('roles')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
                $table->timestamps();
    
        
        });


        DB::table('permissions')->insert([
            [
                'name' => 'create',
                'role_id' => 1,
            ],
            [
                'name' => 'read',
                'role_id' => 1,
            ],
            [
                'name' => 'update',
                'role_id' => 1,
            ],
            [
                'name' => 'delete',
                'role_id' => 1,
            ],
          
        ]);
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
