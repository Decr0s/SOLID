<?php

namespace App\Application;

use App\Application\Interfaces\IEnrollRepository;
use App\Application\Interfaces\IFindCourseById;
use App\Application\Interfaces\IFindIfStudentIsEnrolled;
use App\Application\Interfaces\IFindStudentWithCoursesById;
use App\Application\Interfaces\ITotalStudentCredits;
use App\Course;
use App\Exceptions\EnrollmentErrorException;
use App\Http\Interfaces\IEnroll;
use App\Http\Requests\EnrollStudentRequest;
use App\Student;

class Enroll implements IEnroll
{
    private $courseFinder;
    private $studentFinder;
    private $enrollRepository;
    private $totalStudentCredits;
    private $studentIsEnrolled;

    public function __construct(IFindCourseById $courseFinder, IFindStudentWithCoursesById $studentFinder,
                                IEnrollRepository $enrollRepository, ITotalStudentCredits $totalStudentCredits,
                                IFindIfStudentIsEnrolled $studentIsEnrolled)
    {
        $this->courseFinder = $courseFinder;
        $this->studentFinder = $studentFinder;
        $this->enrollRepository = $enrollRepository;
        $this->totalStudentCredits = $totalStudentCredits;
        $this->studentIsEnrolled = $studentIsEnrolled;
    }

    function execute(EnrollStudentRequest $request, $id)
    {
        $student = $this->studentFinder->findWithCoursesById($id);
        $course = $this->courseFinder->findById($request->input('courseId'));

        $credits = $this->totalStudentCredits->getCredits($student);
        $studentIsAlreadyEnrolled = $this->studentIsEnrolled->findStudentIsEnrolled($student, $request->input('courseId'));

        if (!$student->isEnrolled || ($student->semester < $course->availableOnSemester) || ($credits + $course->credits) > 32 || $studentIsAlreadyEnrolled)
            throw new EnrollmentErrorException;

        $this->enrollRepository->enroll($student, $request->input('courseId'));
    }
}