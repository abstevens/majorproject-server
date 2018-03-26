<?php

use Illuminate\Database\Seeder;
use \App\User;
use \App\Event;
use \App\EventAttendance;

class EventAttendancesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users =  User::pluck('id');
        $events = Event::pluck('id');
        $eventCount = $events->count();

        $attendanceAmount = round($eventCount / 100) * 80;
        $events = $events->slice(0, $attendanceAmount);

        $events->each(function ($event) use ($users) {
            $randomUserAmount = mt_rand(3, $users->count());
            $eventUsers = $users->random($randomUserAmount);

            $eventUsers->each(function ($user) use ($event) {
                factory(EventAttendance::class)->create([
                        'user_id' => $user,
                        'event_id' => $event,
                ]);
            });
        });
    }
}
