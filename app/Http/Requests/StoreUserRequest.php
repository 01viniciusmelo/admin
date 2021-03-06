<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'role_id' => ['required'],
            'password' => ['required', 'confirmed'],
            'password_confirmation' => ['required']
            
        ];
    }
    
    public function messages () {
    
        return [
            
            'name.required' => 'El *Nombre de Usuario es requerido.',
            
            'email.required' => 'El *Correo Electronico es requerido.',
            'email.email' => 'El *Correo Electronico debe ser un Correo Electronico valido: Ej. usuario@correo.com.',
            'email.unique' => 'El *Correo Electronico ya fue creado, favor de elegir otro.',
            
            'role_id.required' => 'El *Rol es requerido.',
            
            'password.required' => 'La *Contrasena es requerida.',
            'password.confirmed' => 'La *Contrasena debe ser confirmada.',
            
            'password_confirmation.required' => 'La *Confirmacion de Contrasena es requerida.'
            
        ];
    }
}
