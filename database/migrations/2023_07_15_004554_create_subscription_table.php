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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->decimal('total_amount', 8, 2);
            $table->foreignId('partner_id')->constrained('partners')->onDelete('cascade');
            $table->foreignId('subscription_type_id')->constrained('subscription_types');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('state')->default('pendiente');
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
        Schema::dropIfExists('subscriptions');
    }
};
