<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'nombre_completo' => ['required', 'string', 'max:100'],
            'name' => ['required', 'string', 'max:50', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'photo' => ['nullable', 'string'],
            'descripcion_perfil' => ['nullable', 'string'],
        ])->validate();

        return User::create([
            'nombre_completo' => $input['nombre_completo'],
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'photo' => !empty($input['photo']) ? $input['photo'] : '/icono-usuario-anonimo.svg',
            'descripcion_perfil' => !empty($input['descripcion_perfil']) ? $input['descripcion_perfil'] : '¡Hola! Soy nuev@ por aquí.',
            'perfil_privado' => false,
            'is_admin' => false,
            'remember_token' => Str::random(60), // 🔹 Generar un token aleatorio
        ]);
    }
}
