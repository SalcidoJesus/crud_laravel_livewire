<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Nota>
 */
class NotaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' => $this -> faker -> sentence(3),
			'descripcion' => $this -> faker -> sentence(10),
			'estatus' => $this -> faker -> randomElement([ 'completado', 'pendiente' ]),
			'fk_usuario' => $this -> faker -> randomElement([ 1, 2 ])
        ];
    }
}
