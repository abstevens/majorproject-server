<?php

use Illuminate\Database\Seeder;
use \App\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        echo "Seeding: PermissionsTableSeeder... ";

        factory(Permission::class, 20)->create();
    }
}
