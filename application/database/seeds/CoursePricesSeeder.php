<?php

use Illuminate\Database\Seeder;
use \App\Course;

class CoursePricesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // TODO: Problem with installment output
        $courses =  Course::all();
        $installments = ['200', '400', '800'];

        $courses->each(function ($course, $key) use ($installments) {
            $installmentKey = array_rand($installments);
            $installment = $installments[$installmentKey];

            factory(App\CoursePrice::class)->create([
                'course_id' => $course->getAttribute('id'),
                'installments' => $installment,
            ]);
        });
    }
}
