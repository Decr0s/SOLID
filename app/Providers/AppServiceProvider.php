<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    public function register()
    {
        $this->app->bind(
            'App\Http\Interfaces\ICourseCreation',
            'App\Application\CourseCreation'
        );

        $this->app->bind(
            'App\Http\Interfaces\IChangeCourse',
            'App\Application\ChangeCourse'
        );

        $this->app->bind(
            'App\Http\Interfaces\ICancelCourse',
            'App\Application\CancelCourse'
        );

        $this->app->bind(
            'App\Http\Interfaces\IRegisterStudent',
            'App\Application\RegisterStudent'
        );

        $this->app->bind(
            'App\Http\Interfaces\IEnroll',
            'App\Application\Enroll'
        );

        $this->app->bind(
            'App\Http\Interfaces\ICancelEnrollment',
            'App\Application\CancelEnrollment'
        );

        // Repositories

        $this->app->bind(
            'App\Application\Interfaces\IPersistCourseRepository',
            'App\Infrastructure\PersistenceViaEloquent\Courses\CourseRepository'
        );

        $this->app->bind(
            'App\Application\Interfaces\IFindCourseById',
            'App\Infrastructure\PersistenceViaEloquent\Courses\CourseRepository'
        );

        $this->app->bind(
            'App\Application\Interfaces\IDeleteCourseRepository',
            'App\Infrastructure\PersistenceViaEloquent\Courses\CourseRepository'
        );

        $this->app->bind(
            'App\Http\Interfaces\IFindCourses',
            'App\Infrastructure\PersistenceViaEloquent\Courses\CourseRepository'
        );

        $this->app->bind(
            'App\Application\Interfaces\IPersistStudentRepository',
            'App\Infrastructure\PersistenceViaEloquent\Students\StudentsRepository'
        );

        $this->app->bind(
            'App\Application\Interfaces\IFindStudentWithCoursesById',
            'App\Infrastructure\PersistenceViaEloquent\Students\StudentsRepository'
        );

        $this->app->bind(
            'App\Application\Interfaces\IEnrollRepository',
            'App\Infrastructure\PersistenceViaEloquent\Students\StudentsRepository'
        );

        $this->app->bind(
            'App\Application\Interfaces\ITotalStudentCredits',
            'App\Infrastructure\PersistenceViaEloquent\Students\StudentsRepository'
        );

        $this->app->bind(
            'App\Application\Interfaces\IFindIfStudentIsEnrolled',
            'App\Infrastructure\PersistenceViaEloquent\Students\StudentsRepository'
        );

        $this->app->bind(
            'App\Application\Interfaces\IFindStudentById',
            'App\Infrastructure\PersistenceViaEloquent\Students\StudentsRepository'
        );

        $this->app->bind(
            'App\Application\Interfaces\ICancelEnrollmentRepository',
            'App\Infrastructure\PersistenceViaEloquent\Students\StudentsRepository'
        );

        $this->app->bind(
            'App\Http\Interfaces\IFindStudents',
            'App\Infrastructure\PersistenceViaEloquent\Students\StudentsRepository'
        );
    }
}
