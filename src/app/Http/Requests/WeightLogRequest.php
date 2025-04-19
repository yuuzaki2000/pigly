<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WeightLogRequest extends FormRequest
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
            'date' => 'required',
            'weight' => 'required',
            'calories' => 'required|numeric',
            'exercise_time' => 'required',
            'exercise_content' => 'max:120'
        ];
    }

    public function messages(){
        return [
            'date.required' => '日付を入力して下さい',
            'weight.required' => '体重を入力してください',
            'calories.required' => '摂取カロリーを入力してください',
            'calories.numeric' => '数字で入力してください',
            'exercise_time.required' => '運動時間を入力してください',
        ];
    }
}
