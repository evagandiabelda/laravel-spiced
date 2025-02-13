<?php

use Illuminate\Support\Str;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Se establece como PK y como AUTO_INCREMENT por defecto.
            $table->string('nombre_completo', 100);
            $table->string('name', 50)->unique();
            $table->string('email', 100)->unique();
            $table->date('email_verified_at')->default(now());
            $table->string('password');
            $table->string('photo')->default('/icono-usuario-anonimo.svg');
            $table->text('descripcion_perfil')->nullable();
            $table->boolean('perfil_privado')->default(false);
            $table->timestamps(); // created_at y updated_at
            $table->string('remember_token')->default(Str::random(60)); // 🔹 Generar un token aleatorio
            $table->boolean('is_admin')->default(false);
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
