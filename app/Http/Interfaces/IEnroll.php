<?php

namespace App\Http\Interfaces;

use App\Http\Requests\EnrollStudentRequest;

interface IEnroll
{
    function execute(EnrollStudentRequest $request, $id);
}