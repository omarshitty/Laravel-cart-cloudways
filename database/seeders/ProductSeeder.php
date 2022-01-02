<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product =[
                [
                    'name' =>'apple',
                    'detials' =>'desktop',
                    'description' =>'computer',
                    'brands' =>'apple',
                    'price' => 2000,
                    'shipping_cost' => 25,
                    'image_path' =>'storage/product1.pong'
                ],
                [
                    'name' =>'sumsung',
                    'detials' =>'j1',
                    'description' =>'moblie',
                    'brands' =>'sumsung',
                    'price' => 3000,
                    'shipping_cost' => 25,
                    'image_path' =>'storage/product2.pong'
                ]
            ];

        foreach($product as $key => $value){
            Product::create($value);
        }
    }
}
