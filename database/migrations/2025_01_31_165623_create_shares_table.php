<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('shares', function (Blueprint $table) {
            $table->id(); // Se establece como PK y como AUTO_INCREMENT por defecto.
            $table->foreignId('usuario_id')->constrained()->onDelete('cascade'); // FK
            $table->dateTime('fecha_publicacion');
            $table->string('titulo');
            $table->text('texto');
            $table->string('img_principal')->nullable();
            $table->string('img_secundaria')->nullable();
            $table->boolean('share_verificado')->default(false);
            $table->timestamps(); // created_at y updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('shares');
    }
};
