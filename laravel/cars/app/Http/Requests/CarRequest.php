<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
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
            'plate' => 'required | unique:cars',
            'brand' => 'required',
            'model' => 'required',
            'year' => 'required | integer',
            'last_revision_date' => 'required | date',
            'photo' => 'required | image',
            'price' => 'required | numeric'
        ];
    }
}
