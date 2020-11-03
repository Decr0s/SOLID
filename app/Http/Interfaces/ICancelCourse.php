<?php

namespace App\Http\Interfaces;

interface ICancelCourse
{
    function execute(int $id);
}