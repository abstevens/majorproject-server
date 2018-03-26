<?php

use Illuminate\Database\Seeder;
use \App\User;
use \App\News;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::pluck('id');

        $users->each(function ($user) {
            factory(News::class, mt_rand(1, 10))->create([
                'user_id' => $user,
            ]);
        });
    }
}
