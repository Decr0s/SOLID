<?php

namespace App\Application;

use App\Application\Interfaces\IPersistCourseRepository;
use App\Course;
use App\Http\Interfaces\ICourseCreation;
use App\Http\Requests\CreateCourseRequest;

class CourseCreation implements ICourseCreation
{
    private $repository;

    public function __construct(IPersistCourseRepository $repository)
    {
        $this->repository = $repository;
    }

    function execute(CreateCourseRequest $request): int
    {
        $course = new Course;
        $course->name = $request->input('name');
        $course->credits = $request->input('credits');
        $course->availableOnSemester = $request->input('availableOnSemester');

        return $this->repository->persist($course);
    }
}