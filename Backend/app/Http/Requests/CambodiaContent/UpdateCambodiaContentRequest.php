<?php

namespace App\Http\Requests\CambodiaContent;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCambodiaContentRequest extends FormRequest
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
            'page' => 'sometimes|required|string|max:255',
            'title' => 'sometimes|required|string|max:255',
            'content' => 'sometimes|required|string',
            'image' => 'nullable|file|image|mimes:jpg,jpeg,png|max:2048',
            'page_content_id' => 'sometimes|required|integer', // Add this line
        ];
    }
}
