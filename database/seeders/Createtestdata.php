<?php

namespace Database\Seeders;

use App\Models\admin;
use App\Models\categories;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class Createtestdata extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         categories::create([
            'name' => 'العيادات',
        ]);

       


    }
}
