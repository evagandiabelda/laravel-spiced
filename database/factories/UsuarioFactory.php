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
            'nombre_usuario' => $this->faker->unique()->userName(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => bcrypt('password'),
            'foto' => $this->faker->imageUrl(640, 480, 'people'),
            'descripcion_perfil' => $this->faker->paragraph(),
            'perfil_privado' => $this->faker->boolean(),
        ];
    }
}
