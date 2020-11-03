<?php

namespace App\Application;

use App\Application\Interfaces\IFindCourseById;
use App\Application\Interfaces\IPersistCourseRepository;
use App\Course;
use App\Http\Interfaces\IChangeCourse;
use App\Http\Requests\ChangeCourseRequest;

class ChangeCourse implements IChangeCourse
{
    private $finder;
    private $repository;

    public function __construct(IFindCourseById $finder, IPersistCourseRepository $repository)
    {
        $this->finder = $finder;
        $this->repository = $repository;
    }

    function execute(ChangeCourseRequest $request, int $id)
    {
        $course = $this->finder->findById($id);

        $course->credits = $request->input('credits');
        $course->availableOnSemester = $request->input('availableOnSemester');

        $this->repository->persist($course);
    }
}