<?php

use Illuminate\Database\Seeder;
use \App\Course;
use \App\SchoolClass;

class SchoolClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        echo "Seeding: SchoolClassesTableSeeder... ";

        $courses =  Course::pluck('id');

        $courses->each(function ($course) {
            $classesCount = mt_rand(1,6);

            for ($i = 0; $i <= $classesCount; $i++) {
                factory(SchoolClass::class)->create([
                    'course_id' => $course,
                ]);
            }
        });
    }
}
