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
        Schema::create('role_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id')->constrained('roles')
                ->onUpdate('cascade')
                ->onDelete('cascade');  
            $table->foreignId('user_id')->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });


        // DB::table('role_user')->insert([
        //     'role_id' => 1,
        //     'user_id' => 1,
        //     'is_active' => true,
        // ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_user');
    }
};
