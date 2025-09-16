<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Vehicle;

class VehicleFactory extends Factory
{
    protected $model = Vehicle::class;

    public function definition()
    {
        return [
            'placa' => strtoupper($this->faker->bothify('???-###')),
            'marca' => $this->faker->company(),
            'modelo' => $this->faker->word(),
            'anio' => $this->faker->numberBetween(2000, 2024),
            'cliente_nombre' => $this->faker->firstName(),
            'cliente_apellidos' => $this->faker->lastName(),
            'cliente_documento' => $this->faker->numerify('########'),
            'cliente_email' => $this->faker->safeEmail(),
            'cliente_telefono' => $this->faker->phoneNumber(),
        ];
    }
}
