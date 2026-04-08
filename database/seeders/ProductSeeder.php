<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Attribute;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $shirt = Product::create([
            'name' => 'Premium Custom Shirt',
            'base_price' => 500,
            'image' => 'https://www.beyours.in/cdn/shop/files/iron-grey-flatlay.jpg?v=1766647549&width=1200',
        ]);

        $shirtSize = Attribute::create(['name' => 'Shirt Size']);
        $shirtSize->options()->createMany([
            ['value' => 'S', 'price_modifier' => 0],
            ['value' => 'M', 'price_modifier' => 0],
            ['value' => 'L', 'price_modifier' => 0],
            ['value' => 'XL', 'price_modifier' => 0],
        ]);

        $shirtFabric = Attribute::create(['name' => 'Shirt Fabric']);
        $shirtFabric->options()->createMany([
            ['value' => 'Cotton', 'price_modifier' => 0],
            ['value' => 'Linen', 'price_modifier' => 50],
            ['value' => 'Silk', 'price_modifier' => 150],
            ['value' => 'Egyptian Cotton', 'price_modifier' => 200],

        ]);
        $shirtCollar = Attribute::create(['name' => 'Collar Style']);
        $shirtCollar->options()->createMany([
            ['value' => 'Classic', 'price_modifier' => 0],
            ['value' => 'Spread', 'price_modifier' => 20],
            ['value' => 'Button-Down', 'price_modifier' => 30],
            ['value' => 'V-Neck', 'price_modifier' => 40],
            ['value' => 'Mandarin', 'price_modifier' => 50],
        ]);
        $shirtbuttons = Attribute::create(['name' => 'Buttons']);
        $shirtbuttons->options()->createMany([
            ['value' => 'Plastic', 'price_modifier' => 10],
            ['value' => 'Metal', 'price_modifier' => 20],
        ]);
        $shirtsleeve = Attribute::create(['name' => 'Sleeve Length']);
        $shirtsleeve->options()->createMany([
            ['value' => 'Short Sleeve', 'price_modifier' => 10],
            ['value' => 'Long Sleeve', 'price_modifier' => 30],
        ]);

        $shirtpocket = Attribute::create(['name' => 'Pocket']);
        $shirtpocket->options()->createMany([
            ['value' => 'No Pocket', 'price_modifier' => 0],
            ['value' => 'Single Pocket', 'price_modifier' => 20],
            ['value' => 'Double Pocket', 'price_modifier' => 40],
        ]);
        $shirtColor= Attribute::create(['name' => 'Color']);
        $shirtColor->options()->createMany([
            ['value' => 'White', 'price_modifier' => 0],
            ['value' => 'Blue', 'price_modifier' => 0],
            ['value' => 'Pink', 'price_modifier' => 0],
            ['value' => 'Black', 'price_modifier' => 0],
        ]);

        $pants = Product::create([
            'name' => 'Custom Tailored Pants',
            'base_price' => 700,
            'image' => 'https://www.mont.com.au/cdn/shop/products/mont-adventure-light-pants-men-xs-driftwood-clothing-bottoms-pants-mens-adventure-light-pants-men-68-02-16-766759333_2000x.jpg?v=1768459116',
        ]);

        // سمات البنطلون
        $pantsFit = Attribute::create(['name' => 'Pants Fit']);
        $pantsFit->options()->createMany([
            ['value' => 'Slim Fit', 'price_modifier' => 0],
            ['value' => 'Regular Fit', 'price_modifier' => 0],
            ['value' => 'Skinny Fit', 'price_modifier' => 0],
        ]);

        $pantsFabric = Attribute::create(['name' => 'Pants Fabric']);
        $pantsFabric->options()->createMany([
            ['value' => 'Gabardine', 'price_modifier' => 0],
            ['value' => 'Wool Mixed', 'price_modifier' => 100],
            ['value' => 'Italian Wool', 'price_modifier' => 250],
        ]);

        $pantsWaist = Attribute::create(['name' => 'Waist Style']);
        $pantsWaist->options()->createMany([
            ['value' => 'Normal', 'price_modifier' => 0],
            ['value' => 'High Waist', 'price_modifier' => 50],
        ]);
    }
}
