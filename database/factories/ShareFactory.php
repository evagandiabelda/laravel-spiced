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
            'texto'             => implode("\n\n", array_map(fn() => implode(' ', $this->faker->sentences(8)), range(1, 5))),
            'img_principal'     => 'https://picsum.photos/640/480?random=' . $this->faker->unique()->numberBetween(1, 10000),
            'img_secundaria'    => 'https://picsum.photos/640/480?random=' . $this->faker->unique()->numberBetween(1, 10000),
            'share_verificado'  => $this->faker->boolean(),
            'usuario_id'        => Usuario::factory(),
        ];
    }
}
