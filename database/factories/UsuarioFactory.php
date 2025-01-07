<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UsuarioFactory extends Factory
{
    protected $model = \App\Models\Usuario::class;

    public function definition()
    {
        return [
            'nombre_completo' => $this->faker->name,
            'nombre_usuario' => $this->faker->unique()->userName,
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password'),
            'foto' => null,
            'descripcion_perfil' => $this->faker->sentence,
            'lista_shares_publicados' => json_encode([]),
            'lista_shares_guardados' => json_encode([]),
            'lista_notificaciones' => json_encode([]),
            'perfil_privado' => $this->faker->boolean,
        ];
    }
}
