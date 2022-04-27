<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions =[
//************* UNIT*************************** */
            'menu unit',
            'view unit',
            'new unit',
            'edit unit',
            'delete unit',
//************* CATEGORY*************************** */
//             'menu category',
//             'view category',
//             'new category',
//             'edit category',
//             'delete category',
// //************* WAREHOUSE*************************** */
//             'menu warehouse',
//             'view warehouse',
//             'new warehouse',
//             'edit warehouse',
//             'delete warehouse',
// //********************Order******************************* */
//             'menu order',
//             'view order',
//             'view details order',
// //*******************Product****************************** */
//             'menu product',
//             'view product',
//             'edit product',
//             'delete product',
//             'new product',
// //*******************Setting****************************** */
//             'menu setting',
//             'view setting',
//             'new setting',
//             'delete setting',

// //********************Users************************************ */
//             'menu account',
//             'view admin',
//             'edit admin',
//             'delete admin',

//             'menu brand',
//             'view brand',
// //********************Permission************************************ */
//             'new permission',
//             'edit permission',
//             'delete permission',

// //********************Roles************************************ */

//             'menu roles',
//             'view roles',
//             'new roles',
//             'delete roles'

        ];

        foreach ($permissions as $permission)
        {
            // Permission::create(['guard_name' => 'web','name'=> $permission]);
            Permission::create(['guard_name' => 'admin','name'=> $permission]);
        }
    }

}
