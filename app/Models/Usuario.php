<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/* use Laravel\Sanctum\HasApiTokens; // Per a l'autenticació a rutes API. */

class Usuario extends Model
{
    use HasFactory;

    // Nombre de la tabla en MySQL:
    protected $table = 'usuarios';

    // Atributos que se pueden asignar en masa:
    protected $fillable = [
        'nombre_completo',
        'nombre_usuario',
        'email',
        'password',
        'foto',
        'descripcion_perfil',
        'perfil_privado',
    ];


    // Relación con otras tablas:

    public function shares()
    {
        return $this->hasMany(Share::class); // Relación 1:N
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class); // Relación 1:N
    }

    public function spices()
    {
        return $this->belongsToMany(Spice::class); // Relación N:N
    }

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class); // Relación N:N
    }

}
