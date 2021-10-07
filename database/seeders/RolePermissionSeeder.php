<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'Admin']);
        $manager = Role::create(['name' => 'Manager']);
        $staff = Role::create(['name' => 'Staff']);

        $view_role = Permission::create(['name' => 'view role']);
        $create_role = Permission::create(['name' => 'create role']);
        $store_role = Permission::create(['name' => 'store role']);
        $update_role = Permission::create(['name' => 'update role']);
        $delete_role = Permission::create(['name' => 'delete role']);

        $view_task = Permission::create(['name' => 'view task']);
        $create_task = Permission::create(['name' => 'create task']);
        $store_task = Permission::create(['name' => 'store task']);
        $update_task = Permission::create(['name' => 'update task']);
        $delete_task = Permission::create(['name' => 'delete task']);

        $admin->givePermissionTo($view_role, $create_role, $store_role, $update_role, $delete_role, $view_task, $create_task, $store_task, $update_task, $delete_task);
        $manager->givePermissionTo($view_task, $create_task, $store_task, $update_task, $delete_task);
        $staff->givePermissionTo($view_task);
    }
}
