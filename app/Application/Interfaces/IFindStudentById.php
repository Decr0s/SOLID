<?php

namespace App\Application\Interfaces;

use App\Student;

interface IFindStudentById
{
    function findById(int $id) : Student;
}