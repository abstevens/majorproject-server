<?php

use Illuminate\Database\Seeder;

class SchoolClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\SchoolClass::class, 10)->create(
            //TODO: add course_id
        );
    }
}
