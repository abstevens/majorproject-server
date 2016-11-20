<?php

use Illuminate\Database\Seeder;
use \App\Course;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        echo "Seeding: CoursesTableSeeder... ";

        factory(Course::class, 25)->create();
    }
}
