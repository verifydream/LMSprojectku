<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Impor',
                'slug' => 'impor',
                'description' => 'Materi pembelajaran tentang proses impor barang dan regulasinya',
                'image_url' => 'categories/Impor.jpg',
                'is_active' => true,
                'order' => 1,
            ],
            [
                'name' => 'Ekspor',
                'slug' => 'ekspor',
                'description' => 'Materi pembelajaran tentang proses ekspor barang dan regulasinya',
                'image_url' => 'categories/Ekspor.jpg',
                'is_active' => true,
                'order' => 2,
            ],
            [
                'name' => 'Cukai',
                'slug' => 'cukai',
                'description' => 'Materi pembelajaran tentang cukai dan peraturannya',
                'image_url' => 'categories/Cukai.jpg',
                'is_active' => true,
                'order' => 3,
            ],
            [
                'name' => 'IMEI',
                'slug' => 'imei',
                'description' => 'Materi pembelajaran tentang registrasi IMEI dan kepabeanan perangkat telekomunikasi',
                'image_url' => 'categories/IMEI.jpg',
                'is_active' => true,
                'order' => 4,
            ],
            [
                'name' => 'Lainnya',
                'slug' => 'lainnya',
                'description' => 'Materi pembelajaran lainnya yang berkaitan dengan kepabeanan',
                'image_url' => 'categories/Lainnya.jpg',
                'is_active' => true,
                'order' => 5,
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
