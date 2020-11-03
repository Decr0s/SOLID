<?php

namespace App\Application\Interfaces;

use App\Student;

interface IFindStudentWithCoursesById
{
    function findWithCoursesById(int $id) : Student;
}