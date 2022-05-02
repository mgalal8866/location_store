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
         User::create([
            'name' => 'Brand',
            'mobile' => '01024346010',
            'password' => bcrypt('01024346010'),
            'city_id' => 3,
            'region_id' => 8,
            'gender' =>0
        ]);

        $admin = admin::create([
            'name' => 'Brand',
            'mobile' => '01024346011',
            'password' => bcrypt('01024346011')
        ]);
        $role = Role::create(['guard_name' => 'admin', 'name' => 'Super Admin']);
        $permissions = Permission::where('guard_name', 'admin')->pluck('id', 'id')->all();
        $role->syncPermissions($permissions);
        $admin->assignRole([$role->id]);


    }
}
