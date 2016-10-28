<?php

use Illuminate\Database\Seeder;
use \App\User;
use \App\Payment;

class PaymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        echo "Seeding: PaymentsTableSeeder... ";

        $users = User::pluck('id');

        $users->each(function ($user) {
            factory(Payment::class, mt_rand(1, 3))->create([
                'user_id' => $user,
            ]);
        });
    }
}
