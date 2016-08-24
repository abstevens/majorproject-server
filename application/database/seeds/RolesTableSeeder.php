<?php

use Illuminate\Database\Seeder;
use \App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        echo "Seeding: RolesTableSeeder... ";

        factory(Role::class, 10)->create();
    }
}
