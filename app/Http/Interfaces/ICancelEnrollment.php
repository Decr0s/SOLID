<?php

namespace App\Http\Interfaces;

use App\Http\Requests\CancelEnrollmentStudentRequest;

interface ICancelEnrollment
{
    function execute(CancelEnrollmentStudentRequest $request, $id);
}