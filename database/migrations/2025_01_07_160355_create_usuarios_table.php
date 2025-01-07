<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_completo');
            $table->string('nombre_usuario')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->binary('foto')->nullable();
            // $table->unsignedBigInteger('id_lista_spices')->nullable();
            $table->text('descripcion_perfil')->nullable();
            $table->json('lista_shares_publicados')->nullable();
            $table->json('lista_shares_guardados')->nullable();
            // $table->unsignedBigInteger('id_lista_comentarios')->nullable();
            $table->json('lista_notificaciones')->nullable();
            $table->boolean('perfil_privado')->default(false);

            // Claves foráneas (si las tablas referenciadas ya existen)
            // $table->foreign('id_lista_spices')->references('id')->on('usuarios_spices')->onDelete('cascade');
            // $table->foreign('id_lista_comentarios')->references('id')->on('usuarios_comentarios')->onDelete('cascade');

            $table->timestamps(); // created_at y updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
