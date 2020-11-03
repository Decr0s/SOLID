<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('/students/{id?}', 'StudentsController@listCoursesStudentsAreEnrolledIn');
Route::post('/students', 'StudentsController@register');
Route::post('/students/enroll/{id}', 'StudentsController@enroll');
Route::delete('/students/cancelEnrollment/{id}', 'StudentsController@cancelEnrollment');

Route::get('/courses/{id?}', 'CoursesController@listStudentsEnrolledOnCourse');
Route::post('/courses', 'CoursesController@create');
Route::put('/courses/{id}', 'CoursesController@change');
Route::delete('/courses/{id}', 'CoursesController@cancel');