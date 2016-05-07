<?php

use Illuminate\Database\Seeder;
use \App\User;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();

        $maxEventOwners = round($users->count() / 5);
        $randomUserAmount = mt_rand(3 , $maxEventOwners);
        $organizers = $users->random($randomUserAmount);

        $organizers->each(function ($organizer, $key) {
            /** @var \App\User $organizer */
            factory(App\Event::class, mt_rand(1, 5))->create([
                'organizer_id' => $organizer->getAttribute('id'),
            ]);
        });
    }
}
