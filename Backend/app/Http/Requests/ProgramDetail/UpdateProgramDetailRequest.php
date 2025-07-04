<?php

namespace App\Http\Requests\ProgramDetail;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProgramDetailRequest extends FormRequest
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
        return [
            'program_id' => 'sometimes|required|exists:programs,id',
            'description' => 'sometimes|required|string',
        ];
    }
}
