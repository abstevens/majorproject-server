<?php

use Illuminate\Database\Seeder;
use \App\User;

class AddressesTableSeeder extends Seeder
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
            factory(App\Address::class, mt_rand(1, 3))->create([
                'user_id' => $user->getAttribute('id'),
            ]);
        });
    }
}
