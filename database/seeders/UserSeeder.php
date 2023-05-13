<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // guide here
        // https://www.honeybadger.io/blog/user-roles-permissions-in-laravel/

        $roleSuperAdmin = Role::findByName('super-admin');
        $roleAdmin = Role::findByName('admin');

        // ===== Create super admin
        $superAdmin = User::create([
            'name' => 'superadmin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt(11111),
        ]);
        $superAdmin->assignRole($roleSuperAdmin);

        // ===== Create admin
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt(11111),
        ]);
        $admin->assignRole($roleAdmin);
    }
}
