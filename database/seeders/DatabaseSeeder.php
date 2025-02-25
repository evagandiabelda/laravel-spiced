<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\ShareSeeder;
use Database\Seeders\ComentarioSeeder;
use Database\Seeders\CategoriaSeeder;
use Database\Seeders\SpiceSeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Quan executem "php artisan db:seed", cridarà als seeders en l'ordre que volem:
        $this->call([
            CategoriaSeeder::class,
            SpiceSeeder::class,
            UserSeeder::class,
            ShareSeeder::class,
            ComentarioSeeder::class,
        ]);
    }
}
