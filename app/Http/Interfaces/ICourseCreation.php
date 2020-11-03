<?php

namespace App\Http\Interfaces;

use App\Http\Requests\CreateCourseRequest;

interface ICourseCreation
{
    function execute(CreateCourseRequest $request) : int;
}