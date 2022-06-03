<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name'=>'Admin',
            'email'=>'admin@kelompok2.com',
            'password'=>bcrypt('admin123'),
        ]);

        $admin_role = Role::create(['name' => 'superadmin']);

        $permission = Permission::create(['name' => 'Users access']);
        $permission = Permission::create(['name' => 'Users edit']);
        $permission = Permission::create(['name' => 'Users create']);
        $permission = Permission::create(['name' => 'Users delete']);

        $permission = Permission::create(['name' => 'Roles access']);
        $permission = Permission::create(['name' => 'Roles edit']);
        $permission = Permission::create(['name' => 'Roles create']);
        $permission = Permission::create(['name' => 'Roles delete']);

        $permission = Permission::create(['name' => 'Permissions access']);
        $permission = Permission::create(['name' => 'Permissions edit']);
        $permission = Permission::create(['name' => 'Permissions create']);
        $permission = Permission::create(['name' => 'Permissions delete']);
        
        $permission = Permission::create(['name' => 'OAuth access']);
        $permission = Permission::create(['name' => 'OAuth edit']);
        $permission = Permission::create(['name' => 'OAuth create']);
        $permission = Permission::create(['name' => 'OAuth delete']);

        $admin->assignRole($admin_role);

        $admin_role->givePermissionTo(Permission::all());
    }
}
