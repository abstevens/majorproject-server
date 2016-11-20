<?php

use Illuminate\Database\Seeder;
use \App\User;
use \App\UserPayment;

class UserPaymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        echo "Seeding: UserPaymentsTableSeeder... ";

        $users = User::pluck('id');

        $users->each(function ($user) {
            factory(UserPayment::class, mt_rand(1, 3))->create([
                'user_id' => $user,
            ]);
        });
    }
}
