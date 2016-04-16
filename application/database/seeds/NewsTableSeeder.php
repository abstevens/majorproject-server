<?php

use Illuminate\Database\Seeder;
use \App\User;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();

        $users->each(function ($user, $key) {
            factory(App\News::class, mt_rand(1, 10))->create([
                'user_id' => $user->getAttribute('id'),
            ]);
        });
    }
}
