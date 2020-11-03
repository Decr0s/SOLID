<?php

namespace App\Application\Interfaces;

use App\Student;

interface ICancelEnrollmentRepository
{
    function cancelEnrollment(Student $student, int $courseId);
}