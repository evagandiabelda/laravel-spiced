<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Usuario;

class UsuarioFactory extends Factory
{
    protected $model = Usuario::class;

    public function definition()
    {
        return [
            'nombre_completo' => $this->faker->name(),
            'nombre_usuario' => $this->faker->userName(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => bcrypt('password'),
            'foto' => 'https://i.pravatar.cc/' . $this->faker->unique()->numberBetween(1, 1000),
            'descripcion_perfil' => $this->faker->paragraph(),
            'perfil_privado' => $this->faker->boolean(),
        ];
    }
}
