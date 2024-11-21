<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
      $admin = User::Create([
        'name'  => 'Admin',
        'email' => 'admin@admin.in',
        'password' => bcrypt('admin@admin')
      ]);
      $store = User::Create([
        'name'  => 'Manager',
        'email' => 'manager@manager.in',
        'password' => bcrypt('manager@manager')
      ]);
      $ca = User::Create([
        'name'  => 'CA',
        'email' => 'caca@caca.in',
        'password' => bcrypt('caca@caca')
      ]);
      $admin_role = Role::Create(['name' => 'Admin']);
      $manager_role = Role::Create(['name' => 'Manager']);
      $ca_role      = Role::Create(['name' => 'CA']);

    //user
      $permission = Permission::Create(['name' => 'User access']);
      $permission = Permission::Create(['name' => 'User edit']);
      $permission = Permission::Create(['name' => 'User create']);
      $permission = Permission::Create(['name' => 'User delete']);
    //role
      $permission = Permission::Create(['name' => 'Role access']);
      $permission = Permission::Create(['name' => 'Role edit']);
      $permission = Permission::Create(['name' => 'Role create']);
      $permission = Permission::Create(['name' => 'Role delete']);

    //permission
      $permission = Permission::Create(['name' => 'Permission access']);
      $permission = Permission::Create(['name' => 'Permission edit']);
      $permission = Permission::Create(['name' => 'Permission create']);
      $permission = Permission::Create(['name' => 'Permission delete']);

      $admin->assignRole($admin_role);
      $store->assignRole($manager_role);

      // Assign permissions to roles
      $admin_role->givePermissionTo(Permission::all());
    }
}
