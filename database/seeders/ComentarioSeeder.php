<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Share;
use App\Models\Comentario;

class ComentarioSeeder extends Seeder
{
    public function run()
    {
        // Per cada share a la BD, es generen 3 comentaris aleatoris:
        $shares = Share::all();
        $shares->each(function($share) {
            Comentario::factory()->count(3)->create([
                'share_id' => $share->id
            ]);
        });
    }
}
