<?php

use Illuminate\Database\Seeder;
use \App\School;
use \App\User;

class SchoolUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $schools = School::all();

        $schools->each(function ($school, $key) use ($users) {
            factory(App\SchoolUser::class, 100)->create([
                'school_id' => $school->getAttribute('id'),
                'user_id' => $users->random()->getAttribute('id'),
            ]);
        });
    }
}
