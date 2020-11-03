<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->dateTime('birthDate');
            $table->string('gender');
            $table->integer('semester');
            $table->boolean('isEnrolled');
            $table->dateTime('createdAt');
            $table->dateTime('updatedAt');
            $table->dateTime('deletedAt')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('students');
    }
}
