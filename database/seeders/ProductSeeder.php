<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as FakerFactory;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = FakerFactory::create();

        for ($i = 0; $i < 20; $i++) {
            $data = [
                'name' => $faker->name,
                'price' => $faker->price,
                'quantity' => $faker->quantity,
                'category_id' => $faker->category_id,
                'image' => $faker->image,

            ];
            DB::table('products')->insert($data);
        };
    }
}
