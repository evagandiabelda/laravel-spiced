<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    use HasFactory;

    // Nombre de la tabla en MySQL:
    protected $table = 'shares';

    // Atributos que se pueden asignar en masa:
    protected $fillable = [
        'fecha_publicacion',
        'titulo',
        'texto',
        'img_principal',
        'img_secundaria',
        'share_verificado',
        'usuario_id'
    ];


    // Relación con otras tablas:

    public function comentarios()
    {
        return $this->hasMany(Comentario::class); // Relación 1:N
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class); // Relación 1:N
    }

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class); // Relación N:N
    }

    public function spices()
    {
        return $this->belongsToMany(Spice::class); // Relación N:N
    }

}
