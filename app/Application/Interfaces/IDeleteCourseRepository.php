<?php

namespace App\Application\Interfaces;

use App\Course;

interface IDeleteCourseRepository
{
    function delete(Course $course);
}