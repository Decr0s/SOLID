<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('credits');
            $table->integer('availableOnSemester');
            $table->dateTime('createdAt');
            $table->dateTime('updatedAt');
            $table->dateTime('deletedAt')->nullable();
        });

        Schema::create('students_courses', function (Blueprint $table) {
            $table->unsignedInteger('student_id');
            $table->foreign('student_id')->references('id')->on('students');

            $table->unsignedInteger('course_id');
            $table->foreign('course_id')->references('id')->on('courses');
        });
    }

    public function down()
    {
        Schema::dropIfExists('courses');
        Schema::dropIfExists('students_courses');
    }
}
