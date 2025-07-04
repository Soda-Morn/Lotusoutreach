<?php

namespace App\Http\Requests\NewContent;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewContentRequest extends FormRequest
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
            'page' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|file|image|mimes:jpg,jpeg,png|max:2048',
            'image_path' => 'nullable|string|max:255',
            'page_content_id' => 'required|integer', 
            'publication_date' => 'nullable|date', 
            'author' => 'nullable|string|max:255', 
        ];
    }
}
