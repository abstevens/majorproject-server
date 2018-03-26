<?php

use Illuminate\Database\Seeder;
use \App\CourseClass;
use \App\CourseUser;
use \App\CourseClassAttendance;

class CourseClassAttendancesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classes =  CourseClass::pluck('id');
        $course_users =  CourseUser::pluck('id');

        $classes->each(function ($class) use ($course_users) {
            $randomCourseUserAmount = mt_rand(5, 40);
            $courseUserAttendances = $course_users->random($randomCourseUserAmount);

            $courseUserAttendances->each(function ($course_user) use ($class) {
                factory(CourseClassAttendance::class)->create([
                    'course_user_id' => $course_user,
                    'class_id' => $class,
                ]);
            });
        });
    }
}
