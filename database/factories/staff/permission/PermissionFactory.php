<?php

namespace Database\Factories\staff\permission;

use App\Models\staff\role\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\staff\permission\Permission>
 */
class PermissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        /*NOMBRE DE LOS PERMISOS QUE QUIERO: lectura, edicion, eliminar, creacion*/
        return [
            'name' => $this->faker->name(),
            //role_id
            'role_id' => Role::inRandomOrder()->first()->id,
        ];
    }
}
