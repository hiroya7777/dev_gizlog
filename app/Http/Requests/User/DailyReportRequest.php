<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class DailyReportRequest extends FormRequest
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
            'title' => 'required|max:30',
            'content' => 'required|max:1000',
            'reporting_time' => [
                'required',
                Rule::unique('daily_reports')->where(function ($query) {
                    return $query->where('user_id',$this->user()->id);
                }),
            ]
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '入力必須の項目です。',
            'content.required' => '入力必須の項目です。',
            'reporting_time.required' => '入力必須の項目です。',
            'reporting_time.unique' => 'その日付の日報はすでに存在しています。'
        ];
    }
}

