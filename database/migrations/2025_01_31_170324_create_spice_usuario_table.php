<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('spice_usuario', function (Blueprint $table) {
            $table->id(); // Se establece como PK y como AUTO_INCREMENT por defecto.
            $table->foreignId('usuario_id')->constrained()->onDelete('cascade'); // FK
            $table->foreignId('spice_id')->constrained()->onDelete('cascade'); // FK
            $table->timestamps(); // created_at y updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('spice_usuario');
    }
};