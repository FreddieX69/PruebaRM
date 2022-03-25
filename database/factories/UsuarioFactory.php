<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Usuario>
 */
class UsuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'primer_nombre' => $this->faker->firstName(),
            'segundo_nombre' => $this->faker->firstName(),
            'tercer_nombre' => $this->faker->firstName(),
            'primer_apellido' => $this->faker->lastName(),
            'segundo_apellido' => $this->faker->lastName(),
            'apellido_casada' => $this->faker->lastName(),
            'fecha_nacimiento' => $this->faker->date($format = 'Y-m-d', $max = '-18 years'),
            'num_dpi' => $this->faker->numerify('#############'),
            'profesion' => $this->faker->jobTitle(),
            'foto' => $this->faker->imageUrl($width = 600, $height = 400),
            'anios_laborando' => $this->faker->randomDigit(),
            'salario' => $this->faker->numberBetween($min = 2954, $max = 50000),
            'email' => $this->faker->email(),
            'contrasenia' => Hash::make('password'),
            'rol_id' => $this->faker->numberBetween($min = 3, $max = 3),
            'estado_id' => $this->faker->numberBetween($min = 3, $max = 3),
            //'estado_id' => $this->faker->randomElement(['pendiente', 'aceptado', 'rechazado']),
            
        ];
    }
}
