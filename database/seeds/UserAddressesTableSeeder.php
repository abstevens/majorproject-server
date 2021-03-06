<?php

use Illuminate\Database\Seeder;
use \App\User;
use \App\UserAddress;

class UserAddressesTableSeeder extends Seeder
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
            factory(UserAddress::class, mt_rand(1, 3))->create([
                'user_id' => $user,
            ]);
        });
    }
}
