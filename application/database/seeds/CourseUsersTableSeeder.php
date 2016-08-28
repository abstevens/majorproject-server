<?php

use Illuminate\Database\Seeder;
use \App\Course;
use \App\User;

class CourseUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        echo "Seeding: CourseUsersTableSeeder... ";

        $courses =  Course::pluck('id');
        $users =  User::pluck('id');

        $courses->each(function ($course) use ($users) {
            $randomUserAmount = mt_rand(10, $users->count());
            $courseUsers = $users->random($randomUserAmount);

            $courseUsers->each(function ($user) use ($course) {
                DB::table('course_user')->insert(
                    [
                        'course_id' => $course,
                        'user_id' => $user,
                    ]
                );
            });
        });
    }
}
