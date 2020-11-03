<?php

namespace App\Application;

use App\Application\Interfaces\IPersistStudentRepository;
use App\Exceptions\InvalidAgeException;
use App\Http\Interfaces\IRegisterStudent;
use App\Http\Requests\RegisterStudentRequest;
use App\Student;

class RegisterStudent implements IRegisterStudent
{
    private $repository;

    public function __construct(IPersistStudentRepository $repository)
    {
        $this->repository = $repository;
    }

    function execute(RegisterStudentRequest $request): int
    {
        $student = new Student;
        $student->name = $request->input('name');
        $student->birthDate = $request->input('birthDate');
        $student->gender = $request->input('gender');
        $student->semester = $request->input('semester');
        $student->isEnrolled = $request->input('isEnrolled');

        $age = date_diff(date_create($student->birthDate), date_create('now'))->y;

        if ($age < 16)
            throw new InvalidAgeException;

        return $this->repository->persist($student);
    }
}