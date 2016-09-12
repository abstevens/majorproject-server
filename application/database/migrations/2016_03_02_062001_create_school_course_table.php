<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_course', function (Blueprint $table) {
            $table->integer('school_id')->unsigned();
            $table->integer('course_id')->unsigned();

            $table->primary(['school_id', 'course_id']);

            $table->foreign('school_id')->references('id')->on('schools');
            $table->foreign('course_id')->references('id')->on('courses');

            $table->unique(['school_id', 'course_id']);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('school_course');
    }
}
