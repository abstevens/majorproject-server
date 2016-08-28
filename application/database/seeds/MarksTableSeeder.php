<?php

use Illuminate\Database\Seeder;
use \App\User;
use \App\Mark;

class MarksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        echo "Seeding: MarksTableSeeder... ";

        $users = User::pluck('id');

        $users->each(function ($user) {
            factory(Mark::class, mt_rand(5, 20))->create([
                'user_id' => $user,
            ]);
        });
    }
}
