<?php

use Illuminate\Database\Seeder;
use \App\Role;
use \App\Permission;

class RolePermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        echo "Seeding: RolePermissionsTableSeeder... ";

        $roles =  Role::pluck('id');
        $permissions =  Permission::pluck('id');

        var_dump('ROLES: ' . $roles);
        $roles->each(function ($role, $key) use ($permissions) {
            $randomPermissionsAmount = mt_rand(3, $permissions->count());
            $rolePermissions = $permissions->random($randomPermissionsAmount);

            var_dump('ROLEPERMISSIONS: ' . $rolePermissions);
            $rolePermissions->each(function ($permission, $key) use ($role) {
                var_dump('PERMISSION: ' . $permission);
                var_dump('ROLE: ' . $role);
                DB::table('role_permission')->insert([
                    'role_id' => $role,
                    'permission_id' => $permission,
                ]);
            });
        });
    }
}
