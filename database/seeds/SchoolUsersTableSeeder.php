<?php

use Illuminate\Database\Seeder;
use \App\School;
use \App\User;
use \App\SchoolUser;

class SchoolUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        echo "Seeding: SchoolUsersTableSeeder... ";

        /** @var $users \Illuminate\Database\Eloquent\Collection */
        $users = User::pluck('id')->toArray();
        $schools = School::pluck('id');

        $schools->each(function ($school) use ($users) {
            $tempUsers = $users;
            for ($i = 0; $i < 30; $i++) {
                $user = array_rand($tempUsers, 1);

                factory(SchoolUser::class, 1)->create([
                    'school_id' => $school,
                    'user_id' => $tempUsers[$user],
                ]);

                unset($tempUsers[$user]);
            }
        });
    }
}
