<?php

use Illuminate\Database\Seeder;
use \App\Course;
use \App\Award;

class AwardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses =  Course::all();

        $courses->each(function ($course, $key) {
            factory(Award::class)->create([
                'course_id' => $course->getAttribute('id'),
            ]);
        });
    }
}
