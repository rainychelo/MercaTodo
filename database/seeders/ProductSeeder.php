<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name'=>'camisa',
            'value'=>15,
            'stock'=>200,
            'image_path'=>'1643335494-camisa.jpg',
        ]);
        Product::create([
            'name'=>'zapato',
            'value'=>20,
            'stock'=>230,
            'image_path'=>'1643348835-zapato.jpg',
        ]);
        Product::create([
            'name'=>'xbox',
            'value'=>500,
            'stock'=>40,
            'image_path'=>'1643348913-xbox.jpg',
        ]);
        Product::create([
            'name'=>'ps5',
            'value'=>499,
            'stock'=>15,
            'image_path'=>'1643348926-ps5.jpg',
        ]);
        Product::create([
            'name'=>'switch',
            'value'=>350,
            'stock'=>300,
            'image_path'=>'1643348979-switch.jpg',
        ]);
        Product::create([
            'name'=>'jean',
            'value'=>12,
            'stock'=>820,
            'image_path'=>'1643349074-jean.jpg',
        ]);
        Product::create([
            'name'=>'guantes',
            'value'=>30,
            'stock'=>122,
            'image_path'=>'1643349183-guantes.jpg',
        ]);

    }
}
