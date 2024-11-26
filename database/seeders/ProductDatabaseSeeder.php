<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;


class ProductDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Bộ Đồ Bơi Bé Gái',
                'description' => 'Bộ đồ bơi thiết kế dễ thương, thoải mái cho bé gái.',
                'sale' => 12.0,
                'price' => 150000,
            ],
            [
                'name' => 'Áo Khoác Bé Trai',
                'description' => 'Áo khoác dạ ấm áp, phù hợp cho mùa đông cho bé trai.',
                'sale' => 20.0,
                'price' => 400000,
            ],
            [
                'name' => 'Bộ Đồ Thể Thao Bé Gái',
                'description' => 'Bộ đồ thể thao năng động với áo và quần co giãn cho bé gái.',
                'sale' => 10.0,
                'price' => 200000,
            ],
            [
                'name' => 'Giày Boot Bé Trai',
                'description' => 'Giày boot da thời trang cho bé trai, bảo vệ chân trong mùa đông.',
                'sale' => 15.0,
                'price' => 350000,
            ],
            [
                'name' => 'Áo Sơ Mi Bé Gái',
                'description' => 'Áo sơ mi dễ thương, phù hợp với nhiều dịp cho bé gái.',
                'sale' => 8.0,
                'price' => 180000,
            ],
        ];


        DB::table('products')->insert($products);

    }
}
