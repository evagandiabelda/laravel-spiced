<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;
use App\Models\Share;

class ShareSeeder extends Seeder
{
    public function run()
    {
        // Per cada usuari a la BD, es generen 3 shares aleatoris:
        $usuarios = Usuario::all();
        $usuarios->each(function($usuario) {
            Share::factory()->count(3)->create([
                'usuario_id' => $usuario->id
            ]);
        });
    }
}
