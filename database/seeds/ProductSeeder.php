<?php

use Illuminate\Database\Seeder;
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
        DB::table('products')->insert([
            ['category_id' => 1, 'image' => 'iphone11promax.jpg','name' => 'iPhone 11 Pro Max', 'price' => 16000000, 'description' => 'Promo Apple iPhone 11 Pro Max 256 GB - Garansi Resmi iBox Apple Indonesia'],
        ]);

        DB::table('products')->insert([
            ['category_id' => 2, 'image' => 'macbookpro.jpg','name' => 'Macbook Pro 2020', 'price' => 19000000, 'description' => 'Macbook Pro 2020 13” Touch Bar MXK32 MXK62 1.4GHz 4C i5 8GB 256GB - GRS APPLE INTER, SPACE GREY'],
        ]);

        DB::table('products')->insert([
            ['category_id' => 3, 'image' => 'samsungtv.jpg', 'name' => 'Samsung Smart TV', 'price' => 4000000, 'description' => 'GRATIS ONGKIR samsung 55 inch uhd 4k curved smart tv 55ru7300'],
        ]);

        DB::table('products')->insert([
            ['category_id' => 3, 'image' => 'samsungtv.jpg', 'name' => 'Samsung Smart TV', 'price' => 4000000, 'description' => 'GRATIS ONGKIR samsung 55 inch uhd 4k curved smart tv 55ru7300'],
        ]);

        DB::table('products')->insert([
            ['category_id' => 3, 'image' => 'samsungtv.jpg', 'name' => 'Samsung Smart TV', 'price' => 4000000, 'description' => 'GRATIS ONGKIR samsung 55 inch uhd 4k curved smart tv 55ru7300'],
        ]);

        DB::table('products')->insert([
            ['category_id' => 3, 'image' => 'samsungtv.jpg', 'name' => 'Samsung Smart TV', 'price' => 4000000, 'description' => 'GRATIS ONGKIR samsung 55 inch uhd 4k curved smart tv 55ru7300'],
        ]);
    }
}
