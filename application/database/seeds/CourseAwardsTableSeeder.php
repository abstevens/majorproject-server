<?php

use Illuminate\Database\Seeder;
use \App\Course;
use \App\CourseAward;

class CourseAwardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        echo "Seeding: CourseAwardsTableSeeder... ";

        $courses =  Course::pluck('id');

        $courses->each(function ($course) {
            factory(CourseAward::class, mt_rand(1, 3))->create([
                'course_id' => $course,
            ]);
        });
    }
}
