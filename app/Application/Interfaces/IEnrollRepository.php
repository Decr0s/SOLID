<?php

namespace App\Application\Interfaces;

use App\Student;

interface IEnrollRepository
{
    function enroll(Student $student, int $courseId);
}