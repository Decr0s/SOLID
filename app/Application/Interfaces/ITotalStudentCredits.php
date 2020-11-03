<?php

namespace App\Application\Interfaces;

use App\Student;

interface ITotalStudentCredits
{
    function getCredits(Student $student);
}