<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id(); // Se establece como PK y como AUTO_INCREMENT por defecto.
            $table->string('nombre_completo', 100);
            $table->string('nombre_usuario', 50)->unique();
            $table->string('email', 100)->unique();
            $table->string('password');
            $table->string('foto')->nullable();
            $table->text('descripcion_perfil')->nullable();
            $table->boolean('perfil_privado')->default(false);
            $table->timestamps(); // created_at y updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
};
