<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
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

        $guest = User::create([
            'name'=>'Guest',
            'email'=>'guest@kelompok2.com',
            'password'=>bcrypt('admin123'),
        ]);

        $admin_role = Role::create(['name' => 'superadmin']);
        $guest_role = Role::create(['name' => 'guest']);

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
        $guest->assignRole($guest_role);

        $admin_role->givePermissionTo(Permission::all());

        $profile = DB::table('profile')->insert([
            'profile_name'=>'Admin',
            'user_id'=>1,
            'gender'=>'Male',
            'birthday'=> date('Y-m-d H:i:s'),
        ]);

        $profile = DB::table('profile')->insert([
            'profile_name'=>'Test',
            'user_id'=>2,
            'gender'=>'Male',
            'birthday'=> date('Y-m-d H:i:s'),
        ]);
    }
}
