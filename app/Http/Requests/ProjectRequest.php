<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title'       => ['required', 'string', 'min:4', 'max:120'],
            'description' => ['nullable', 'string', 'max:1000'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required'  => 'El título del proyecto es obligatorio.',
            'title.min'       => 'El título debe tener al menos 4 caracteres.',
            'title.max'       => 'El título no puede exceder los 120 caracteres.',
            'description.max' => 'La descripción no puede superar los 1000 caracteres.',
        ];
    }
}

