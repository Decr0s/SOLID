<?php

namespace App\Http\Interfaces;

use App\Http\Requests\RegisterStudentRequest;

interface IRegisterStudent
{
    function execute(RegisterStudentRequest $request) : int;
}