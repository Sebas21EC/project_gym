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
        Schema::create('role_module', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id')->constrained('roles')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('module_id')->constrained('modules')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->boolean('create')->default(false);
            $table->boolean('read')->default(false);
            $table->boolean('update')->default(false);
            $table->boolean('delete')->default(false);
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
        Schema::dropIfExists('role_module');
    }
};
