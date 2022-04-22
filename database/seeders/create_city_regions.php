<?php

namespace Database\Seeders;

use App\Models\cities;
use App\Models\regions;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class create_city_regions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $jsoncity = File::get("database/data/todo.json");
        $city = json_decode($jsoncity);

        foreach ($city as $key => $value) {
            cities::create([
                "city_name_ar" => $value->city_name_ar,
                "city_name_en" => $value->city_name_en,
            ]);
        }
        $jsonregion = File::get("database/data/todo.json");
        $region = json_decode($jsonregion);

        foreach ($region as $key => $value) {
            regions::create([
                "city_id" => $value->city_id,
                "region_name_ar" => $value->region_name_ar,
                "region_name_en" => $value->region_name_en,
            ]);
        }
    }
}
