<?php

namespace App\Http\Controllers;

use App\Application\CourseCreation;
use App\Course;
use App\Http\Interfaces\ICancelCourse;
use App\Http\Interfaces\IChangeCourse;
use App\Http\Interfaces\ICourseCreation;
use App\Http\Interfaces\IFindCourses;
use App\Http\Requests\ChangeCourseRequest;
use App\Http\Requests\CreateCourseRequest;
use Exception;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    private $courseCreation;
    private $changeCourse;
    private $cancelCourse;
    private $finder;

    public function __construct(ICourseCreation $courseCreation, IChangeCourse $changeCourse, ICancelCourse $cancelCourse,
                                IFindCourses $finder)
    {
        $this->courseCreation = $courseCreation;
        $this->changeCourse = $changeCourse;
        $this->cancelCourse = $cancelCourse;
        $this->finder = $finder;
    }

    public function create(CreateCourseRequest $request)
    {
        try
        {
            $request->validate();
            $id = $this->courseCreation->execute($request);

            return response()
                ->json([
                    'success' => true,
                    'id' => $id
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

    public function change(ChangeCourseRequest $request, $id)
    {
        try
        {
            $request->validate();
            $this->changeCourse->execute($request, $id);

            return response()
                ->json([
                    'success' => true,
                ]);
        }
        catch (Exception $e)
        {
            return response()
                ->json([
                    'success' => false,
                ]);
        }
    }

    public function cancel($id)
    {
        try
        {
            $this->cancelCourse->execute($id);

            return response()
                ->json([
                    'success' => true,
                ]);
        }
        catch (Exception $e)
        {
            return response()
                ->json([
                    'success' => false,
                ]);
        }
    }

    public function listStudentsEnrolledOnCourse($id = 0)
    {
        return response()
            ->json([
                'success' => true,
                'courses' => $this->finder->find($id)
            ]);
    }
}