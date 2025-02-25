<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Share;
use App\Models\Categoria;
use App\Models\Spice;

class ShareSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();

        $users->each(function($user) {
            // Crear 3 shares por usuario
            $shares = Share::factory()->count(3)->create(['user_id' => $user->id]);

            // Obtener todas las categorías disponibles:
            $categorias = Categoria::all();

            // Obtener todos los spices disponibles:
            $spices = Spice::all();

            // Asignar entre 1 y 3 categorías aleatorias a cada Share:
            $shares->each(function($share) use ($categorias) {
                $share->categorias()->attach(
                    $categorias->random(rand(1, 3))->pluck('id')->toArray()
                );
            });

            // Asignar entre 1 y 3 spices aleatorios a cada Share:
            $shares->each(function($share) use ($spices) {
                $share->spices()->attach(
                    $spices->random(rand(1, 3))->pluck('id')->toArray()
                );
            });
        });
    }
}

