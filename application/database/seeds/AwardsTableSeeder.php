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
        echo "Seeding: AwardsTableSeeder... ";

        $courses =  Course::pluck('id');

        $courses->each(function ($course) {
            factory(Award::class)->create([
                'course_id' => $course,
            ]);
        });
    }
}
