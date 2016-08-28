<?php

use Illuminate\Database\Seeder;
use \App\User;
use \App\Contact;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        echo "Seeding: ContactsTableSeeder... ";

        $users = User::pluck('id');
        $type = [
            'phone',
            'email',
        ];

        $users->each(function ($user) use ($type) {
            $typeKey = array_rand($type);
            factory(Contact::class, mt_rand(1, 3))->create([
                'user_id' => $user,
                'type' => $type[$typeKey],
            ]);
        });
    }
}
