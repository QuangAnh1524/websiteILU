<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryDBSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Thời trang bé nam',
                'parent_id' => null
            ],
            [
                'name' => 'Áo bé nam',
                'parent_id' => 1 //thuoc thoi trang be nam
            ],
            [
                'name' => 'Quần bé nam',
                'parent_id' => 1, // Thuộc 'Thời trang nam'
            ],
            [
                'name' => 'Thời trang bé nữ',
                'parent_id' => null, // gốc
            ],
            [
                'name' => 'Váy bé nữ',
                'parent_id' => 4, // thuoc thoi trang be nu
            ],
        ];
        DB::table('categories')->insert($categories);
    }
}
