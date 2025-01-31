<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    public function run()
    {
        // Llistat de categories reals:
        $categorias = [
            'Arte',
            'Lectura',
            'Salud y bienestar',
            'Cine y documentales',
            'Gaming',
            'Deportes',
            'Educación',
            'Hogar',
            'Recetas',
            'Compartiendo experiencias'
        ];

        // Crea una categoria per cada element a la llista:
        foreach ($categorias as $categoria) {
            Categoria::create([
                'nombre' => $categoria,
            ]);
        }
    }
}
