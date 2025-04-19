<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WeightTargetRequest extends FormRequest
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
            'target_weight' => 'required|max_digits:4|decimal:1',
        ];
    }

    public function messages(){
        return [
            'target_weight.required' => '体重を入力してください',
            'target_weight.max_digits' => '4桁までの数字で入力してください',
            'weighttarget_weight.decimal' => '小数点は1桁で入力してください',
        ];
    }
}
