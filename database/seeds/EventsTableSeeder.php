<?php

use Illuminate\Database\Seeder;
use \App\User;
use \App\Event;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::pluck('id');

        $maxEventOwners = round($users->count() / 5);
        $randomUserAmount = mt_rand(3, $maxEventOwners);
        $organizers = $users->random($randomUserAmount);

        $organizers->each(function ($organizer) {
            /** @var \App\Event $organizer */
            factory(Event::class, mt_rand(1, 5))->create([
                'organizer_id' => $organizer,
            ]);
        });
    }
}
