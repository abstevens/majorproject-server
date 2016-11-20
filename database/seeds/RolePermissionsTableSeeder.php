<?php

use Illuminate\Database\Seeder;
use \App\Role;
use \App\Permission;
use \App\RolePermission;

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

        $roles->each(function ($role) use ($permissions) {
            $randomPermissionsAmount = mt_rand(3, $permissions->count());
            $rolePermissions = $permissions->random($randomPermissionsAmount);

            $rolePermissions->each(function ($permission) use ($role) {
//                DB::table('role_permission')->insert([
//                    'role_id' => $role,
//                    'permission_id' => $permission,
//                ]);
                factory(RolePermission::class)->create([
                    'role_id' => $role,
                    'permission_id' => $permission,
                ]);
            });
        });
    }
}