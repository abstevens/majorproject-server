<?php

use Illuminate\Database\Seeder;
use \App\User;
use \App\Event;

class EventAttendancesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users =  User::all();
        $events = Event::all();
        $eventCount = $events->count();

        $attendanceAmount = round($eventCount / 100) * 80;
        $events = $events->slice(0, $attendanceAmount);

        $events->each(function ($event, $key) use ($users) {
            $randomUserAmount = mt_rand(3, $users->count());
            $eventUsers = $users->random($randomUserAmount);

            $eventUsers->each(function ($user, $key) use ($event) {
                factory(App\EventAttendance::class)->create([
                        'user_id' => $user->getAttribute('id'),
                        'event_id' => $event->getAttribute('id'),
                ]);
            });
        });
    }
}
