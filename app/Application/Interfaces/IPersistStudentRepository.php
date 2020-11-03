<?php

namespace App\Application\Interfaces;

use App\Student;

interface IPersistStudentRepository
{
    function persist(Student $student) : int;
}