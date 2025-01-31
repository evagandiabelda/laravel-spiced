<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    // Nombre de la tabla en MySQL:
    protected $table = 'categorias';

    // Atributos que se pueden asignar en masa:
    protected $fillable = [
        'nombre',
    ];


    // Relación con otras tablas:

    public function usuarios()
    {
        return $this->belongsToMany(Usuario::class); // Relación N:N
    }

    public function shares()
    {
        return $this->belongsToMany(Share::class); // Relación N:N
    }

}
