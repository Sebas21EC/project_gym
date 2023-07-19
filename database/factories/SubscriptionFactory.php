<?php

namespace Database\Factories;

use App\Models\Partner;
use App\Models\Subscription;
use App\Models\SubscriptionType;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubscriptionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Subscription::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        // $table->id();
        // $table->decimal('total_amount', 8, 2);
        // $table->foreignId('partner_id')->constrained('partners')->onDelete('cascade');
        // $table->foreignId('subscription_type_id')->constrained('subscription_types');
        // $table->date('start_date');
        // $table->date('end_date');
        // $table->string('state')->default('pendiente');
        // $table->softDeletes();
        // $table->timestamps();
        return [
          
            'total_amount' => $this->faker->randomFloat(2, 0, 999999.99),
            'partner_id' => Partner::all()->random()->id,
            'subscription_type_id' => SubscriptionType::all()->random()->id,
            'start_date' => $this->faker->date('Y-m-d'),
            'end_date' => $this->faker->date('Y-m-d'),
            'state' => $this->faker->word,
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
