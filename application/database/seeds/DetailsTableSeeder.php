<?php

use Illuminate\Database\Seeder;
use \App\User;

class DetailsTableSeeder extends Seeder
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
            factory(App\Detail::class, 1)->create([
                'user_id' => $user->getAttribute('id'),
            ]);
        });
    }
}
