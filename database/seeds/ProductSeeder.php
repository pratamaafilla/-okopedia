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
            ['category_id' => 1, 'image' => 's20.jpg', 'name' => 'Samsung Galaxy S20 Plus', 'price' => 9000000, 'description' => 'Display : 6.7 inches
            Chipset : Exynos 990
            Main Camera : 12 MP + 64 MP + 12 MP + TOF 3D, (depth sensor)
            Selfie Camera : Dual : 10 MP
            Battery : 4500 mAh'],
        ]);

        DB::table('products')->insert([
            ['category_id' => 2, 'image' => 'rog.jpg', 'name' => 'ASUS ROG STRIX 3', 'price' => 10000000, 'description' => 'Laptop Asus ROG STRIX III G531GT-I765B1T i7-9750H / 8GB / 512GB SSD / GTX1650 4GB / 15,6" Slim FHD IPS 144HZ / WIN 10'],
        ]);
    }
}
