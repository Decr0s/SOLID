<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangeCourseRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'credits' => 'required|numeric|min:2|max:10',
            'availableOnSemester' => 'required|numeric|min:1|max:10'
        ];
    }
}
