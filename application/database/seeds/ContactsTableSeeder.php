<?php

use Illuminate\Database\Seeder;
use \App\User;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $type = [
            'Phone',
            'Email',
        ];

        $users->each(function ($user, $key) use ($type) {
            factory(App\Contact::class, mt_rand(1, 3))->create([
                'user_id' => $user->getAttribute('id'),
                'type' => array_rand($type),
            ]);
        });
    }
}
