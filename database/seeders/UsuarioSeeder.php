<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;
use App\Models\Spice;

class UsuarioSeeder extends Seeder
{
    public function run()
    {
        $usuarios = Usuario::factory(10)->create();

        // Obtener todos los spices disponibles:
        $spices = Spice::all();

        // Asignar entre 1 y 3 spices aleatorios a cada usuario:
        $usuarios->each(function($usuario) use ($spices) {
            $usuario->spices()->attach(
                $spices->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
