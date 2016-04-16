<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $this->call(UsersTableSeeder::class);

//        $this->call(SchoolsTableSeeder::class);
//        $this->call(SchoolUsersTableSeeder::class);

//        $this->call(EventsTableSeeder::class);
//        $this->call(EventAttendancesTableSeeder::class);

//        $this->call(RolesTableSeeder::class);
//        $this->call(RoleUsersTableSeeder::class);

//        $this->call(PermissionsTableSeeder::class);
//        $this->call(RolePermissionsTableSeeder::class);

//        $this->call(CoursesTableSeeder::class);
//        $this->call(CourseUsersTableSeeder::class);
//        $this->call(CoursePricesSeeder::class);
//        $this->call(AwardsTableSeeder::class);

//        $this->call(SchoolClassesTableSeeder::class);
//        $this->call(ClassUsersTableSeeder::class); // TODO: create this seeder

        $this->call(AddressesTableSeeder::class);
        $this->call(ContactsTableSeeder::class);
        $this->call(DetailsTableSeeder::class);
        $this->call(MarksTableSeeder::class);
        $this->call(NewsTableSeeder::class);
        $this->call(PaymentsTableSeeder::class);
    }
}
