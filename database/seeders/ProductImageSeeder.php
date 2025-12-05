<?php
namespace Database\Seeders;
use App\Models\ProductImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductImageSeeder extends Seeder
{
    public function run(): void
    {
        ProductImage::create([
        'product_id'=>1,
        'image'=>'gaming-laptop-loq.png',
        ]);
        ProductImage::create([
        'product_id'=>2,
        'image'=>'gaming-laptop-asus-rog.png',
        ]);
        ProductImage::create([
        'product_id'=>3,
        'image'=>'zenbook-x200.png',
        ]);
        ProductImage::create([
        'product_id'=>4,
        'image'=>'zenbook-y200.png',
        ]);
        ProductImage::create([
        'product_id'=>5,
        'image'=>'vivobook-flip-14.png',
        ]);
        ProductImage::create([
        'product_id'=>6,
        'image'=>'travelmate-2-in-1-laptop-pro.png',
        ]);
        ProductImage::create([
        'product_id'=>7,
        'image'=>'mechanical-keyboard-mk100.png',
        ]);
        ProductImage::create([
        'product_id'=>8,
        'image'=>'mouse-razer-deathadder.png',
        ]);
        ProductImage::create([
        'product_id'=>9,
        'image'=>'vga-card-rtx-3080.png',
        ]);
        ProductImage::create([
        'product_id'=>10,
        'image'=>'vga-card-rtx-5080.png',
        ]);
    }
}