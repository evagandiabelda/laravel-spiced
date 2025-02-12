<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, HasProfilePhoto, Notifiable, TwoFactorAuthenticatable;

    // Nombre de la tabla en MySQL
    protected $table = 'usuarios'; // <--- Importante

    // Atributos que se pueden asignar en masa
    protected $fillable = [
        'nombre_completo',
        'nombre_usuario',
        'email',
        'password',
        'foto',
        'descripcion_perfil',
        'perfil_privado',
    ];

    // Atributos ocultos
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    // Atributos casteados
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relación con otras tablas:
    public function shares(): HasMany
    {
        return $this->hasMany(Share::class);
    }

    public function comentarios(): HasMany
    {
        return $this->hasMany(Comentario::class);
    }

    public function spices(): BelongsToMany
    {
        return $this->belongsToMany(Spice::class);
    }

    public function categorias(): BelongsToMany
    {
        return $this->belongsToMany(Categoria::class);
    }
}
