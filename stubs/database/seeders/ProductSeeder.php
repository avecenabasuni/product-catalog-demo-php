<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Wireless Mouse Pro',
                'sku' => 'MOUSE-PRO-001',
                'description' => 'Ergonomic wireless mouse with adjustable DPI and silent click buttons.',
                'price' => 39.99,
                'image_url' => 'https://images.unsplash.com/photo-1587829741301-dc798b83add3?auto=format&fit=crop&w=900&q=80',
            ],
            [
                'name' => 'Mechanical Keyboard 87',
                'sku' => 'KEY-87-002',
                'description' => 'Compact tenkeyless mechanical keyboard with hot-swappable switches.',
                'price' => 89.00,
                'image_url' => 'https://images.unsplash.com/photo-1618384887929-16ec33fab9ef?auto=format&fit=crop&w=900&q=80',
            ],
            [
                'name' => '4K Monitor 27"',
                'sku' => 'MON-4K-027',
                'description' => '27-inch UHD monitor with HDR support and USB-C connectivity.',
                'price' => 329.50,
                'image_url' => 'https://images.unsplash.com/photo-1527443224154-c4a3942d3acf?auto=format&fit=crop&w=900&q=80',
            ],
            [
                'name' => 'USB-C Dock Station',
                'sku' => 'DOCK-USBC-004',
                'description' => 'Multi-port USB-C dock with HDMI, Ethernet, and power delivery.',
                'price' => 119.00,
                'image_url' => 'https://images.unsplash.com/photo-1588872657578-7efd1f1555ed?auto=format&fit=crop&w=900&q=80',
            ],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(['sku' => $product['sku']], $product);
        }
    }
}
