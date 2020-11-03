<?php

namespace App\Http\Controllers;

use App\Course;
use App\Exceptions\EnrollmentErrorException;
use App\Exceptions\InvalidAgeException;
use App\Http\Interfaces\ICancelEnrollment;
use App\Http\Interfaces\IEnroll;
use App\Http\Interfaces\IFindStudents;
use App\Http\Interfaces\IRegisterStudent;
use App\Http\Requests\CancelEnrollmentStudentRequest;
use App\Http\Requests\EnrollStudentRequest;
use App\Http\Requests\RegisterStudentRequest;
use App\Student;
use Exception;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    private $registerStudent;
    private $enroll;
    private $cancelEnrollment;
    private $finder;

    public function __construct(IRegisterStudent $registerStudent, IEnroll $enroll, ICancelEnrollment $cancelEnrollment,
                                IFindStudents $finder)
    {
        $this->registerStudent = $registerStudent;
        $this->enroll = $enroll;
        $this->cancelEnrollment = $cancelEnrollment;
        $this->finder = $finder;
    }

    public function register(RegisterStudentRequest $request)
    {
        try
        {
            $request->validate();
            $id = $this->registerStudent->execute($request);

            return response()
                ->json([
                    'success' => true,
                    'id' => $id
                ]);
        }
        catch (InvalidAgeException $e)
        {
            return response()
                ->json([
                    'success' => false,
                    'id' => 0,
                    'error' => 'A idade mínima é 16 anos: ' . $e->getMessage()
                ]);
        }
        catch (Exception $e)
        {
            return response()
                ->json([
                    'success' => false,
                    'id' => 0,
                    'error' => $e->getMessage()
                ]);
        }
    }

    public function enroll(EnrollStudentRequest $request, $id)
    {
        try
        {
            $request->validate();
            $this->enroll->execute($request, $id);

            return response()
                ->json([
                    'success' => true,
                    'id' => 1
                ]);
        }
        catch (EnrollmentErrorException $e)
        {
            return response()
                ->json([
                    'success' => false,
                    'id' => 0,
                    'error' => 'Error: ' . $e->getMessage()
                ]);
        }
        catch (Exception $e)
        {
            return response()
                ->json([
                    'success' => false,
                    'id' => 0
                ]);
        }
    }

    public function cancelEnrollment(CancelEnrollmentStudentRequest $request, $id)
    {
        try
        {
            $request->validate();
            $this->cancelEnrollment->execute($request, $id);

            return response()
                ->json([
                    'success' => true
                ]);
        }
        catch (Exception $e)
        {
            return response()
                ->json([
                    'success' => false
                ]);
        }
    }

    public function listCoursesStudentsAreEnrolledIn($id = 0)
    {
        return response()
            ->json([
                'success' => true,
                'students' => $this->finder->find($id)
            ]);
    }
}