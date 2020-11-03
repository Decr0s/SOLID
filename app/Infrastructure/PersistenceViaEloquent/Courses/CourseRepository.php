<?php

namespace App\Infrastructure\PersistenceViaEloquent\Courses;

use App\Application\Interfaces\IDeleteCourseRepository;
use App\Application\Interfaces\IFindCourseById;
use App\Application\Interfaces\IPersistCourseRepository;
use App\Course;
use App\Http\Interfaces\IFindCourses;

class CourseRepository implements IPersistCourseRepository, IFindCourseById, IDeleteCourseRepository,
    IFindCourses
{
    function persist(Course $course): int
    {
        $course->save();
        return $course->id;
    }

    function findById(int $id): Course
    {
        return Course::find($id);
    }

    function delete(Course $course)
    {
        $course->delete();
    }

    function find(int $id)
    {
        if ($id > 0)
            return Course::with('students')->where('id', $id)->get();

        return Course::with('students')->get();
    }
}