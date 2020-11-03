<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCourseRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|unique:courses|max:70',
            'credits' => 'required|numeric|min:2|max:10',
            'availableOnSemester' => 'required|numeric|min:1|max:10'
        ];
    }
}
