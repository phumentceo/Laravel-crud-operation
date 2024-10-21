<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                "name" => "I phone 13 pro max",
                "price" => 600,
                "qty"  => 10,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "I phone 16 pro",
                "price" => 1600,
                "qty"  => 5,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "Samsung Galaxy a22  ultra",
                "price" => 350,
                "qty"  => 5,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "OPPO Reno 5",
                "price" => 250,
                "qty"  => 10,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "Vivo v53",
                "price" => 250,
                "qty"  => 10,
                "created_at" => now(),
                "updated_at" => now(),
            ],
        ];

        //build query
        DB::table('products')->insert($products);

        // $product = new DB();
        // $product->table('products');
        // $product->insert($products);
    }
}
