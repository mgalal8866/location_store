<?php

namespace Database\Seeders;

use App\Models\admin;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $admin = User::create([
            'name' => 'ADMIN',
            'mobile' => '01024346011',
            'password' => bcrypt('01024346011'),
            'is_admin' => '1'
        ]);
        $role = Role::create(['guard_name' => 'web', 'name' => 'Super Admin']);
        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);
        $admin->assignRole([$role->id]);


    }
}
