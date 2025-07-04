<?php

namespace App\Http\Requests\ProgramDetail;

use Illuminate\Foundation\Http\FormRequest;

class StoreProgramDetailRequest extends FormRequest
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
            'program_id' => 'required|exists:programs,id',
            'description' => 'required|string',
        ];
    }
}
