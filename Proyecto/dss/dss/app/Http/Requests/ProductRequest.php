<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'type_id'       => 'required',
            'name'          => ['required','max:50', Rule::unique('products')->ignore($this->product)],
            'description'   => 'nullable',
            'image'         => 'nullable|image|max:2024',
            'price'         => 'required|numeric|min:0|max:5000',
            'stock'         => 'required|numeric|min:0|max:5000',
        ];
    }
}
