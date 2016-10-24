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

        DB::table('users')->insert([
            'first_name' => 'Test',
            'last_name' => 'Account',
            'username' => 'user1@test.com',
            'email' => 'user1@test.com',
            'password' => bcrypt('1111'),
            'remember_token' => str_random(10),
        ]);

        factory(User::class, 250)->create();
    }
}
