<?php

namespace App\Application\Interfaces;

use App\Course;

interface IPersistCourseRepository
{
    function persist(Course $course) : int;
}