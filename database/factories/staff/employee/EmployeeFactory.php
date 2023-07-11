<?php

namespace Database\Factories\staff\employee;

use App\Models\staff\occupation\Occupation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\staff\employee\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'identity'=> $this->faker->unique()->randomNumber(9),
            'first_name'=> $this->faker->name(),
            'last_name'=>$this->faker->lastName(),
            'phone'=>$this->faker->phoneNumber(),
            'address'=>$this->faker->unique()->address(),
            'occupation_id'=>Occupation::inRandomOrder()->first()->id,

        ];
    }
}
