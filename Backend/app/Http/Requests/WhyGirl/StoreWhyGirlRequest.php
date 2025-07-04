<?php

namespace App\Http\Requests\WhyGirl;

use Illuminate\Foundation\Http\FormRequest;

class StoreWhyGirlRequest extends FormRequest
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
            'page' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image_path' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'page_content_id' => 'nullable|exists:page_contents,id',
        ];
    }
}
