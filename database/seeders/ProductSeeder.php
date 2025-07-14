<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Smartphone',
            'description' => 'Latest model smartphone with advanced features.',
            'sku' => '123456789',
            'price' => 299.99,
            'stock' => 50,
            'category_id' => 1, // Assuming category_id 1 exists
        ]);
    }
}
