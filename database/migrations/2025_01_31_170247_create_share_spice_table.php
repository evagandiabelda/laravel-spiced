<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('share_spice', function (Blueprint $table) {
            $table->id(); // Se establece como PK y como AUTO_INCREMENT por defecto.
            $table->foreignId('share_id')->constrained()->onDelete('cascade'); // FK
            $table->foreignId('spice_id')->constrained()->onDelete('cascade'); // FK
            $table->timestamps(); // created_at y updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('share_spice');
    }
};