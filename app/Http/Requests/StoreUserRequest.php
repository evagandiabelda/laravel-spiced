<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsuarioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // Per a crear un usuari, tots els camps són requerits:
        return [
            'nombre_completo' => 'required|string|max:255',
            'nombre_usuario' => 'required|string|max:255|unique:usuarios',
            'email' => 'required|email|max:255|unique:usuarios',
            'password' => 'required|string|min:8',
            'perfil_privado' => 'boolean',
        ];
    }
}
