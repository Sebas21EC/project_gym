<?php

namespace Database\Factories;

use App\Models\Inventory;
use Illuminate\Database\Eloquent\Factories\Factory;

class InventoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Inventory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // $table->id();
        // $table->string('machine');
        // $table->string('detail');
        // $table->integer('quantity');
        // $table->decimal('unit_price', 8, 2);
        // $table->decimal('total_price', 8, 2);
        // $table->string('state');
        // $table->softDeletes();
        // $table->timestamps();
        return [
         'machine' => $this->faker->word,
            'detail' => $this->faker->word,
            'quantity' => $this->faker->randomDigitNotNull,
            'unit_price' => $this->faker->randomFloat(2, 0, 999999.99),
            'total_price' => $this->faker->randomFloat(2, 0, 999999.99),
            'state' => $this->faker->word,
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
            
        ];
    }
}
