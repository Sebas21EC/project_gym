<?php

namespace Database\Factories;

use App\Models\HealthCard;
use App\Models\Partner;
use Illuminate\Database\Eloquent\Factories\Factory;

class HealthCardFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = HealthCard::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'activity_level' => $this->faker->randomDigitNotNull,
        'feeding_frequency' => $this->faker->randomDigitNotNull,
        'intolerances' => $this->faker->word,
        'allergies' => $this->faker->word,
        'food_preparation' => $this->faker->word,
        'pathology' => $this->faker->word,
        'family_pathology' => $this->faker->word,
        'medication' => $this->faker->word,
        //sacar los ids de la tabla partner
        'partner_id' =>Partner::all()->random()->id,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
