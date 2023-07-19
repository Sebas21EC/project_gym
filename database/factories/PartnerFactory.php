<?php

namespace Database\Factories;

use App\Models\Partner;
use Illuminate\Database\Eloquent\Factories\Factory;

class PartnerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Partner::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        // $table->id();
        // $table->string('name');
        // $table->string('phone');
        // $table->string('address');
        // $table->date('birth_date');
        // $table->string('occupation');
        // $table->string('email');
        // $table->string('type');
        // $table->softDeletes();
        // $table->timestamps();
        return [
            'name' => $this->faker->name,
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'birth_date' => $this->faker->date('Y-m-d'),
            'occupation' => $this->faker->jobTitle,
            'email' => $this->faker->email,
            'type' => $this->faker->randomElement(['student', 'teacher', 'admin']),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
            
        ];
    }
}
