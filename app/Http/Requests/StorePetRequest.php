<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePetRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:255',
            'breed' => 'nullable|string|max:255',
            'birthdate' => 'nullable|date',
            'gender' => 'in:male,female,unknown',
            'color' => 'nullable|string|max:100',
            'weight' => 'nullable|numeric|min:0',
            'is_neutered' => 'boolean',
            'microchip' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tên thú cưng không được để trống.',
            'species.required' => 'Loài thú cưng là bắt buộc.',
            'gender.in' => 'Giới tính chỉ chấp nhận: đực, cái hoặc không rõ.',
            'weight.numeric' => 'Cân nặng phải là số.',
        ];
    }
}
