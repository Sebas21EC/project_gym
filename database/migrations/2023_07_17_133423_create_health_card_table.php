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
        Schema::create('health_cards', function (Blueprint $table) {
            $table->id();
            $table->integer('activity_level');
            $table->integer('feeding_frequency');
            $table->string('intolerances');
            $table->string('allergies');
            $table->string('food_preparation');
            $table->string('pathology');
            $table->string('family_pathology');
            $table->string('medication');
            $table->foreignId('partner_id')->constrained('partners')->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('health_cards');
    }
};
