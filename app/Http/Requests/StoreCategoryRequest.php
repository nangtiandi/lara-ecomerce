<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'category' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'category.required' => 'အမျိုးအစားအားထည့်ပေးရန်လိုအပ်နေပါသည်။'
        ];
    }
}
