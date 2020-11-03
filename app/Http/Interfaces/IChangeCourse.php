<?php

namespace App\Http\Interfaces;

use App\Http\Requests\ChangeCourseRequest;

interface IChangeCourse
{
    function execute(ChangeCourseRequest $request, int $id);
}