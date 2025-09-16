<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contact;

class ContactFactory extends Factory
{
    protected $model = Contact::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->firstName(),
            'apellidos' => $this->faker->lastName(),
            'documento' => $this->faker->numerify('########'),
            'email' => $this->faker->safeEmail(),
            'telefono' => $this->faker->phoneNumber(),
            'cargo' => $this->faker->jobTitle(),
            'notas' => $this->faker->optional()->sentence(),
        ];
    }
}
