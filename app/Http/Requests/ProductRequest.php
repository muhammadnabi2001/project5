<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name'=>'required|max:255',
            'price'=>'required',
            'count'=>'required',
            'img'=>'required',
            'user_id'=>'required',
            'company_id'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => "Nameni to'ldiring",
            'price.required' => "Price to'ldiring",
            'count.required' => "Count ni to'ldiring",
            'img.required' => "imageni to'ldiring",
            'user_id.required' => "User id ni to'ldiring",
            'company_id.required' => "Company id ni to'ldiring",
        ];
    }
}
