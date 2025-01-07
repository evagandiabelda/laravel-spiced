<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        // 'id_lista_spices',
        'descripcion_perfil',
        'lista_shares_publicados',
        'lista_shares_guardados',
        // 'id_lista_comentarios',
        'lista_notificaciones',
        'perfil_privado',
    ];

/* 
    // Relación con otras tablas:
    public function listaSpices()
    {
        return $this->belongsTo(UsuarioSpice::class, 'id_lista_spices');
    }

    public function listaComentarios()
    {
        return $this->belongsTo(UsuarioComentario::class, 'id_lista_comentarios');
    }
*/
}
