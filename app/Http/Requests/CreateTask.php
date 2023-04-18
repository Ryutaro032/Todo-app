<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTask extends FormRequest
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
            //date（日付を表す値であること）after_or_equal（特定の日付と同じまたはそれ以降の日付であること)
            'title'    => 'required|max:100',
            'due_date' => 'required|date|after_or_equal:today',
        ];
    }

    public function attributes(){
        return [
            'title'    => 'タイトル',
            'due_date' => '期限日',
        ];
    }

    public function messages()
    {
        return [
            'due_date.after_or_equal' => ':attribute には今日以降の日付を入力してください。',
        ];
    }
}
