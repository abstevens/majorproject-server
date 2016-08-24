<?php

use Illuminate\Database\Seeder;
use \App\SchoolClass;
use \App\User;

class ClassUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        echo "Seeding: ClassUsersTableSeeder... ";

        $classes =  SchoolClass::pluck('id');
        $users =  User::pluck('id');

        $classes->each(function ($class) use ($users) {
            $randomUserAmount = mt_rand(5, 40);
            $classUsers = $users->random($randomUserAmount);

            $classUsers->each(function ($user) use ($class) {
                DB::table('class_user')->insert(
                    [
                        'class_id' => $class,
                        'user_id' => $user,
                    ]
                );
            });
        });
    }
}
