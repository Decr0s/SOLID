<?php

namespace App\Application\Interfaces;

use App\Course;

interface IFindCourseById
{
    function findById(int $id) : Course;
}