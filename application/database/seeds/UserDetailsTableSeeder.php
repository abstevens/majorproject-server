<?php

use Illuminate\Database\Seeder;
use \App\User;
use \App\UserDetail;

class UserDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        echo "Seeding: UserDetailsTableSeeder... ";

        $users = User::pluck('id');

        $users->each(function ($user) {
            factory(UserDetail::class, mt_rand(1, 3))->create([
                'user_id' => $user,
            ]);
        });
    }
}
