<?php

namespace App\Infrastructure\PersistenceViaEloquent\Students;

use App\Application\Interfaces\ICancelEnrollmentRepository;
use App\Application\Interfaces\IEnrollRepository;
use App\Application\Interfaces\IFindIfStudentIsEnrolled;
use App\Application\Interfaces\IFindStudentById;
use App\Application\Interfaces\IFindStudentWithCoursesById;
use App\Application\Interfaces\IPersistStudentRepository;
use App\Application\Interfaces\ITotalStudentCredits;
use App\Http\Interfaces\IFindStudents;
use App\Student;

class StudentsRepository implements IPersistStudentRepository, IFindStudentWithCoursesById, IEnrollRepository,
    ITotalStudentCredits, IFindIfStudentIsEnrolled, IFindStudentById, ICancelEnrollmentRepository, IFindStudents
{

    function persist(Student $student): int
    {
        $student->save();
        return $student->id;
    }

    function findWithCoursesById(int $id): Student
    {
        return Student::with('courses')->where('id', $id)->first();
    }

    function enroll(Student $student, int $courseId)
    {
        $student->courses()->attach($courseId);
        $student->save();
    }

    function getCredits(Student $student)
    {
        return $student->courses->sum('credits');
    }

    function findStudentIsEnrolled(Student $student, int $courseId): bool
    {
        return $student->courses->where('id', $courseId)->count() > 0;
    }

    function findById(int $id): Student
    {
        return Student::find($id);
    }

    function cancelEnrollment(Student $student, int $courseId)
    {
        $student->courses()->detach($courseId);
        $student->save();
    }

    function find(int $id)
    {
        if ($id > 0)
            return Student::with('courses')->where('id', $id)->get();

        return Student::with('courses')->get();
    }
}