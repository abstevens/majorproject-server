<?php

use Illuminate\Database\Seeder;
use \App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        echo "Seeding: UsersTableSeeder... ";

        User::updateOrCreate(
            [
                'first_name' => 'Test',
                'last_name' => 'Account',
                'email' => 'admin1@test.com',
                'date_of_birth' => '1994-12-25'
            ],
            [
                'password' => bcrypt('1111'),
            ]
        );

        factory(User::class, 250)->create();
    }
}
