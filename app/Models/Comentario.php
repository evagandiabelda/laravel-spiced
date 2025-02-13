<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    // Nombre de la tabla en MySQL:
    protected $table = 'comentarios';

    // Atributos que se pueden asignar en masa:
    protected $fillable = [
        'texto',
        'fecha',
        'user_id',
        'share_id',
    ];


    // Relación con otras tablas:

    public function user()
    {
        return $this->belongsTo(User::class); // Relación 1:N
    }

    public function share()
    {
        return $this->belongsTo(Share::class); // Relación 1:N
    }

}
