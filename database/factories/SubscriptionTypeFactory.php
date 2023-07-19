<?php

namespace Database\Factories;

use App\Models\SubscriptionType;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubscriptionTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SubscriptionType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        // $table->id();
        //     $table->string('name');
        //     $table->integer('n_months');
        //     $table->double('price', 8, 2);
        //     $table->softDeletes();
        //     $table->timestamps();
        return [
        'name' => $this->faker->word,
        'n_months' => $this->faker->randomDigitNotNull,
        'price' => $this->faker->randomFloat(2, 0, 999999.99),
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        
        ];
    }
}
