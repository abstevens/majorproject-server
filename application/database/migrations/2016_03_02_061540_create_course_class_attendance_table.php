<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseClassAttendanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_class_attendance', function (Blueprint $table) {
//            $table->increments('id');
            $table->integer('course_user_id')->unsigned();
            $table->integer('class_id')->unsigned();
            $table->boolean('status');

            $table->primary(['course_user_id', 'class_id']);

            $table->foreign('course_user_id')->references('id')->on('course_user');
            $table->foreign('class_id')->references('id')->on('course_classes');

            $table->unique(['course_user_id', 'class_id']);

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
        Schema::drop('course_class_attendance');
    }
}
