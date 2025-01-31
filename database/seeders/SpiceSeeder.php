<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Spice;

class SpiceSeeder extends Seeder
{
    public function run()
    {
        // Llistat de spices reals:
        $spices = [
            ['nombre' => 'Trastorno del Espectro Autista', 'color' => '#8bc8ea'],
            ['nombre' => 'Trastorno por Déficit de Atención e Hiperactividad', 'color' => '#83d9db'],
            ['nombre' => 'Trastorno Obsesivo Compulsivo', 'color' => '#97e8da'],
            ['nombre' => 'Trastorno Límite de la Personalidad', 'color' => '#a1e5bd'],
            ['nombre' => 'Trastorno de Ansiedad Generalizada', 'color' => '#B9E5A1'],
            ['nombre' => 'Trastorno de Pánico', 'color' => '#CBD07B'],
            ['nombre' => 'Trastorno de la Personalidad Antisocial', 'color' => '#FFCA74'],
            ['nombre' => 'Trastorno Bipolar', 'color' => '#FFA879'],
            ['nombre' => 'Trastorno de Estrés Postraumático', 'color' => '#f2979c'],
            ['nombre' => 'Trastorno Depresivo', 'color' => '#ffb8b3'],
            ['nombre' => 'Trastorno Esquizofrénico', 'color' => '#ffb6c3'],
            ['nombre' => 'Trastornos Alimentarios', 'color' => '#f4a6d6'],
            ['nombre' => 'Adicciones', 'color' => '#dda9ea'],
            ['nombre' => 'Fobias', 'color' => '#cdb0f7'],
            ['nombre' => 'Otros', 'color' => '#A1AEFF'],
        ];

        // Crea un spice per cada element a la llista:
        foreach ($spices as $spice) {
            Spice::create($spice);
        }
    }
}
