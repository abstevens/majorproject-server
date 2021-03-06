<?php

use Illuminate\Database\Seeder;
use \App\School;
use \App\Course;
use \App\SchoolCourse;

class SchoolCoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $schools =  School::pluck('id');
        $courses =  Course::pluck('id');

        $schools->each(function ($school) use ($courses) {
            $randomCourseAmount = mt_rand(10, $courses->count());
            $schoolCourse = $courses->random($randomCourseAmount);

            $schoolCourse->each(function ($course) use ($school) {
                factory(SchoolCourse::class)->create([
                    'school_id' => $school,
                    'course_id' => $course,
                ]);
            });
        });
    }
}
