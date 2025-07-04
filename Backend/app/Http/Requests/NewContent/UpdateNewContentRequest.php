<?php

namespace App\Http\Requests\NewContent;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNewContentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Change to true to allow this request
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
            'image_path' => 'nullable|string|max:255',
            'page_content_id' => 'sometimes|required|integer', // Add this line
            'publication_date' => 'nullable|date', // Optional publication date
            'author' => 'nullable|string|max:255', // Optional author field
        ];
    }
}
