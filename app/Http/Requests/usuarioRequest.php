<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class usuarioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'cpfcnpj' => 'required|string|max:14',
            'danascimento' => 'required|date|before:today',
            'telefone' => 'required|string|regex:/^\(\d{2}\)\s\d\s\d{4}-\d{4}$/',
            'cep' => 'required|string|regex:/^\d{5}-?\d{3}$/',
            'estado' => 'required|string|max:2',
            'cidade' => 'required|string|max:255',
            'bairro' => 'required|string|max:255',
            'endereco' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $this->route('id'),
            'status'=> 'required|max:1',
        ];
    }
}
