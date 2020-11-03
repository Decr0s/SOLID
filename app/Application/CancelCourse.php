<?php

namespace App\Application;

use App\Application\Interfaces\IDeleteCourseRepository;
use App\Application\Interfaces\IFindCourseById;
use App\Http\Interfaces\ICancelCourse;

class CancelCourse implements ICancelCourse
{
    private $finder;
    private $repository;

    public function __construct(IFindCourseById $finder, IDeleteCourseRepository $repository)
    {
        $this->finder = $finder;
        $this->repository = $repository;
    }

    function execute(int $id)
    {
        $course = $this->finder->findById($id);
        $this->repository->delete($course);
    }
}