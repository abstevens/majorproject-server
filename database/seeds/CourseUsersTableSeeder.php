<?php

use Illuminate\Database\Seeder;
use \App\Course;
use \App\User;
use \App\CourseUser;

class CourseUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses =  Course::pluck('id');
        $users =  User::pluck('id');

        $courses->each(function ($course) use ($users) {
            $randomUserAmount = mt_rand(10, $users->count());
            $courseUsers = $users->random($randomUserAmount);

            $courseUsers->each(function ($user) use ($course) {
                factory(CourseUser::class)->create([
                    'course_id' => $course,
                    'user_id' => $user,
                ]);
            });
        });
    }
}
