<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CancelEnrollmentStudentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'courseId' => 'required|numeric'
        ];
    }
}
