<?php

namespace Database\Factories;

use App\Models\Payment;
use App\Models\Subscription;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Payment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // $table->id();
        // $table->foreignId('subscription_id')->constrained('subscriptions')->onDelete('cascade');
        // $table->date('date_payment');
        // $table->decimal('amount', 8, 2);
        // $table->string('payment_method');
        // $table->string('description');
        // $table->softDeletes();
        // $table->timestamps();

        return [
            'subscription_id' => Subscription::all()->random()->id,
            'date_payment' => $this->faker->date('Y-m-d'),
            'amount' => $this->faker->randomFloat(2, 0, 999999.99),
            'payment_method' => $this->faker->word,
            'description' => $this->faker->word,
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
