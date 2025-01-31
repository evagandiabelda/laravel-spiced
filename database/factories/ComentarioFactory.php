<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Usuario;
use App\Models\Share;
use App\Models\Comentario;

class ComentarioFactory extends Factory
{
    protected $model = Comentario::class;

    public function definition()
    {
        return [
            'texto' => $this->faker->sentence(),
            'usuario_id' => Usuario::factory(),
            'share_id' => Share::factory(),
        ];
    }
}
