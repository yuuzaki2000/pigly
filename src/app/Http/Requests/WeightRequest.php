<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WeightRequest extends FormRequest
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
            //
            'weight' => 'required|digits_between:1,4|regex:/^\d+(\.\d{1,2})?$/',
            'target_weight' => 'required|digits_between:1,4|regex:/^\d+(\.\d{1,2})?$/',
        ];
    }

    public function messages(){
        return [
            'weight.required' => '体重を入力してください',
            'weight.digits_between' => '4桁までの数字で入力してください',
            'weight.regex' => '整数または2桁までの数を記入してください',
            'target_weight.required' => '体重を入力してください',
            'target_weight.digits_between' => '4桁までの数字で入力してください',
            'target_weight.regex' => '整数または2桁までの数を記入してください',
        ];
    }
}
