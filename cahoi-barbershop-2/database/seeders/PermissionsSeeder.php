<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'edit articles']);
        Permission::create(['name' => 'delete articles']);
        Permission::create(['name' => 'publish articles']);
        Permission::create(['name' => 'unpublish articles']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'customer']);
        $role1->givePermissionTo('edit articles');
        $role1->givePermissionTo('publish articles');
        $role1->givePermissionTo('delete articles');

        $role2 = Role::create(['name' => 'stylist']);
        $role2->givePermissionTo('publish articles');
        $role2->givePermissionTo('unpublish articles');

        $role3 = Role::create(['name' => 'manage']);
        $role3->givePermissionTo('publish articles');
        $role3->givePermissionTo('unpublish articles');

        $role4 = Role::create(['name' => 'super-admin']);
        $role4->givePermissionTo(Permission::all());

        // create admin users
        $user = User::create([
            'phone_number' => "+84973271208",
            'name' => "admin",
            'password' => Hash::make('Lequangtho12a3')
        ]);

        $user->assignRole($role4);
    }
}
