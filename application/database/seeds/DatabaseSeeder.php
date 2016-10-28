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
        $this->call(UsersTableSeeder::class);
        $this->call(UserAddressesTableSeeder::class);
        $this->call(UserContactsTableSeeder::class);
        $this->call(UserDetailsTableSeeder::class);
        $this->call(UserMarksTableSeeder::class);
        $this->call(PaymentsTableSeeder::class);
        $this->call(NewsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(RoleUsersTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(RolePermissionsTableSeeder::class);
        $this->call(EventsTableSeeder::class);
        $this->call(EventAttendancesTableSeeder::class);
        $this->call(SchoolsTableSeeder::class);
        $this->call(SchoolAddressesTableSeeder::class);
        $this->call(SchoolContactsTableSeeder::class);
        $this->call(SchoolUsersTableSeeder::class);
        $this->call(CoursesTableSeeder::class);
        $this->call(SchoolCoursesTableSeeder::class);
        $this->call(CourseUsersTableSeeder::class);
        $this->call(CoursePricesTableSeeder::class);
        $this->call(CourseAwardsTableSeeder::class);
        $this->call(CourseClassesTableSeeder::class);
        $this->call(CourseClassAttendancesTableSeeder::class);
    }
}
