<?php

use Illuminate\Database\Seeder;
use \App\Course;
use \App\CoursePrice;

class CoursePricesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses =  Course::pluck('id');
        $installments = ['200', '400', '800'];

        $courses->each(function ($course) use ($installments) {
            $installmentKey = array_rand($installments);
            $installment = $installments[$installmentKey];

            factory(CoursePrice::class)->create([
                'course_id' => $course,
                'installments' => $installment,
            ]);
        });
    }
}
