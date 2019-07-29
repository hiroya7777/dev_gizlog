<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class QuestionsRequest extends FormRequest
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
            'tag_category_id' => 'required',
            'title'           => 'required|max:30|string',
            'content'         => 'required',
        ];
    }

    public function messages()
    {
        return [
            'tag_category_id.required' => '選択必須です',
            'title.required'           => '入力必須です',
            'title.max'                => 'タイトルは30文字以内でお願いします',
            'content.required'         => '入力必須です',
        ];
    }
}

