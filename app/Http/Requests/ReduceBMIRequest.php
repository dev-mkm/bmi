<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReduceBMIRequest extends FormRequest
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
            'height' => 'required|integer|min:10',
            'weight' => 'required|integer|min:4',
        ];
    }
}
