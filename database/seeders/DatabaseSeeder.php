<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Database\Seeders\create_city_regions;
use Database\Seeders\PermissionTableseeder;
use Database\Seeders\CreateAdminUserSeeder;
use Database\Seeders\SettingsTableSeeder;
class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call([
            // feek::class,
            create_city_regions::class,
            // PermissionTableseeder::class,
            CreateAdminUserSeeder::class,
            SettingsTableSeeder::class
        ]);
    }
}
