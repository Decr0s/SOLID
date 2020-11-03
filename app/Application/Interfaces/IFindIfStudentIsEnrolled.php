<?php

namespace App\Application\Interfaces;

use App\Student;

interface IFindIfStudentIsEnrolled
{
    function findStudentIsEnrolled(Student $student, int $courseId) : bool;
}