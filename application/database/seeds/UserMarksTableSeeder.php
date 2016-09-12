<?php

use Illuminate\Database\Seeder;
use \App\User;
use \App\UserMark;

class UserMarksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        echo "Seeding: UserMarksTableSeeder... ";

        $users = User::pluck('id');

        $users->each(function ($user) {
            factory(UserMark::class, mt_rand(5, 20))->create([
                'user_id' => $user,
            ]);
        });
    }
}
