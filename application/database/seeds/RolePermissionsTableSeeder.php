<?php

use Illuminate\Database\Seeder;
use \App\Course;
use \App\User;

class RolePermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses =  Course::all();
        $users =  User::all();

        $courses->each(function ($course, $key) use ($users) {
            $randomUserAmount = mt_rand(10 , $users->count());
            $courseUsers = $users->random($randomUserAmount);

            $courseUsers->each(function ($user, $key) use ($course) {
                // TODO: Problem, do you have to make a App\CourseUser??
                DB::table('course_user')->insert(
                    [
                        'course_id' => $course->getAttribute('id'),
                        'user_id' => $user->getAttribute('id'),
                    ]
                );
            });
        });
    }
}
