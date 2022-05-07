<?php

namespace Database\Seeders;

use App\Models\stores;
use App\Models\products;
use App\Models\categories;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class fakeedr extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $faker = Faker::create();
        // foreach(range(1,5) as $index){

        //     categories::create([
        //         'name'=> $faker->name,
        //         'slug' => Str::slug($faker->name)
        //     ]);

        // }

        $faker = Faker::create();
        foreach(range(1,5) as $index){

            categories::create([
                'name'=> $faker->name,
                'slug' => Str::slug($faker->name)
            ]);


            foreach(range(1,2) as $index){
                $store = stores::create([ 'category_id' =>$faker->name,
                'name' => $faker->name,
                'slug' => Str::slug($faker->name),
                'user_id' => $faker->name],
                );
                $store->branch()->create([
                        'city_id' =>  3,
                        'region_id' =>  $faker->numberBetween($min = 93, $max = 138),
                        'address' => $faker->streetAddress,
                        'description' => $faker->realText($maxNbChars = 200, $indexSize = 2),
                        'lat' => $faker->latitude($min = -90, $max = 90),
                        'lng' =>    $faker->longitude($min = -180, $max = 180),
                        'product_num' =>5
                ]);
             }
           foreach(range(1,2) as $index){
                $product = $store->branch()->products::create([
                    'name' =>$faker->name,
                    'slug' => Str::slug($faker->name),
                    'price' =>$faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 500),
                ]);
              }
        }
    }
}
