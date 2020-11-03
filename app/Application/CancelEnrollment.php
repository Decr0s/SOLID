<?php

namespace App\Application;

use App\Application\Interfaces\ICancelEnrollmentRepository;
use App\Application\Interfaces\IFindStudentById;
use App\Http\Interfaces\ICancelEnrollment;
use App\Http\Requests\CancelEnrollmentStudentRequest;
use App\Student;

class CancelEnrollment implements ICancelEnrollment
{
    private $finder;
    private $repository;

    public function __construct(IFindStudentById $finder, ICancelEnrollmentRepository $repository)
    {
        $this->finder = $finder;
        $this->repository = $repository;
    }

    function execute(CancelEnrollmentStudentRequest $request, $id)
    {
        $student = $this->finder->findById($id);
        $this->repository->cancelEnrollment($student, $request->input('courseId'));
    }
}