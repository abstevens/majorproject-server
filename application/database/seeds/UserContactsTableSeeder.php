<?php

use Illuminate\Database\Seeder;
use \App\User;
use \App\UserContact;

class UserContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        echo "Seeding: UserContactsTableSeeder... ";

        $users = User::pluck('id');
        $type = [
            'phone',
            'email',
        ];

        $users->each(function ($user) use ($type) {
            $typeKey = array_rand($type);
            factory(UserContact::class, "contact {$type[$typeKey]}", mt_rand(1, 3))->create([
                'user_id' => $user,
                'type' => $type[$typeKey],
            ]);
        });
    }
}
