<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Spice;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = User::factory(10)->create();

        // Obtener todos los spices disponibles:
        $spices = Spice::all();

        // Asignar entre 1 y 3 spices aleatorios a cada usuario:
        $users->each(function($user) use ($spices) {
            $user->spices()->attach(
                $spices->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
