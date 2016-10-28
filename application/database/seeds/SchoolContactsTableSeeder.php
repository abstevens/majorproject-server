<?php

use Illuminate\Database\Seeder;
use \App\School;
use \App\SchoolContact;

class SchoolContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        echo "Seeding: SchoolContactsTableSeeder... ";

        $schools = School::pluck('id');
        $type = [
            'website',
            'phone',
            'email',
        ];

        $schools->each(function ($school) use ($type) {
            foreach ($type as $key => $value) {
                factory(SchoolContact::class, "contact {$type[$key]}")->create([
                    'school_id' => $school,
                    'type' => $type[$key],
                ]);
            }
        });
    }
}
