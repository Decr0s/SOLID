<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterStudentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|unique:students|max:80|min:5',
            'birthDate' => 'required|date',
            'gender' => 'required|string',
            'semester' => 'required|numeric|min:1|max:14',
            'isEnrolled' => 'required|boolean'
        ];
    }
}
