<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
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
            'title' => 'required',
            'photo' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'sale' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'အမျိုးအစားအားထည့်ပေးရန်လိုအပ်နေပါသည်။',
            'photo.required' => 'ပုံထည့်ပေးရန်လိုအပ်ပါသည်',
            'category_id.required' => 'အမျိုးအစားထည့်ရွေးချယ်ပေးပါ',
            'price.required' =>'စျေးနှုန်းသတ်မှတ်ပေးရန်လိုအပ်ပါသည်',
            'sale.required' => 'promotion ပေးမပေးရွေးချယ်ပေးပါ'
        ];
    }
}
