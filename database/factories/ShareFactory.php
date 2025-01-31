<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Share;
use App\Models\Usuario;

class ShareFactory extends Factory
{
    protected $model = Share::class;

    public function definition()
    {
        return [
            'fecha_publicacion' => $this->faker->dateTimeThisYear(),
            'titulo'            => $this->faker->sentence(),
            'texto'             => $this->faker->paragraph(),
            'img_principal'     => $this->faker->imageUrl(),
            'img_secundaria'    => $this->faker->imageUrl(),
            'share_verificado'  => $this->faker->boolean(),
            'usuario_id'        => Usuario::factory(),
        ];
    }
}
