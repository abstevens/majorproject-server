<?php

use Illuminate\Database\Seeder;
use \App\School;
use \App\SchoolAddress;

class SchoolAddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $schools = School::pluck('id');

        $schools->each(function ($school) {
            factory(SchoolAddress::class)->create([
                'school_id' => $school,
            ]);
        });
    }
}
