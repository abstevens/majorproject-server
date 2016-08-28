<?php

use Illuminate\Database\Seeder;
use \App\User;
use \App\Detail;

class DetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        echo "Seeding: DetailsTableSeeder... ";

        $users = User::pluck('id');

        $users->each(function ($user) {
            factory(Detail::class, mt_rand(1, 3))->create([
                'user_id' => $user,
            ]);
        });
    }
}
