<?php

use Illuminate\Database\Seeder;
use \App\User;
use \App\Address;

class AddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        echo "Seeding: AddressesTableSeeder... ";

        $users = User::pluck('id');

        $users->each(function ($user) {
            factory(Address::class, mt_rand(1, 3))->create([
                'user_id' => $user,
            ]);
        });
    }
}
