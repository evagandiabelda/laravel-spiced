<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
        // Per a editar un usuari, no cal que tots els camps siguen requerits:
        return [
            'nombre_completo' => 'sometimes|string|max:255',
            'name' => 'sometimes|string|max:255|unique:users,name,' . $this->user->id,
            'email' => 'sometimes|email|max:255|unique:users,email,' . $this->user->id,
            'password' => 'sometimes|string|min:8',
            'perfil_privado' => 'boolean',
        ];
    }
}
