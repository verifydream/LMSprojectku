<?php

namespace Database\Seeders;

use App\Models\Material;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $materials = [
            [
                'title' => 'Pengenalan Impor Barang',
                'slug' => 'pengenalan-impor-barang',
                'category_id' => Category::where('slug', 'impor')->first()->id,
                'description' => 'Materi dasar tentang proses impor barang dari luar negeri',
                'content' => '<h2>Pengenalan Impor Barang</h2><p>Impor adalah kegiatan memasukkan barang dari luar negeri ke dalam daerah pabean Indonesia. Proses ini melibatkan berbagai prosedur kepabeanan dan dokumen yang harus dipenuhi.</p>',
                'is_active' => true,
                'rating' => 5,
            ],
            [
                'title' => 'Prosedur Ekspor Indonesia',
                'slug' => 'prosedur-ekspor-indonesia',
                'category_id' => Category::where('slug', 'ekspor')->first()->id,
                'description' => 'Panduan lengkap prosedur ekspor barang ke luar negeri',
                'content' => '<h2>Prosedur Ekspor Indonesia</h2><p>Ekspor adalah kegiatan mengeluarkan barang dari daerah pabean Indonesia ke luar negeri. Eksportir harus memahami berbagai regulasi dan dokumen yang diperlukan.</p>',
                'is_active' => true,
                'rating' => 5,
            ],
            [
                'title' => 'Regulasi Cukai Terbaru',
                'slug' => 'regulasi-cukai-terbaru',
                'category_id' => Category::where('slug', 'cukai')->first()->id,
                'description' => 'Update terbaru mengenai peraturan cukai di Indonesia',
                'content' => '<h2>Regulasi Cukai Terbaru</h2><p>Cukai adalah pungutan negara yang dikenakan terhadap barang-barang tertentu yang memiliki sifat atau karakteristik tertentu.</p>',
                'is_active' => true,
                'rating' => 4,
            ],
            [
                'title' => 'Panduan Registrasi IMEI',
                'slug' => 'panduan-registrasi-imei',
                'category_id' => Category::where('slug', 'imei')->first()->id,
                'description' => 'Cara registrasi IMEI untuk perangkat telekomunikasi',
                'content' => '<h2>Panduan Registrasi IMEI</h2><p>IMEI (International Mobile Equipment Identity) adalah nomor identitas unik untuk setiap perangkat telekomunikasi. Registrasi IMEI wajib dilakukan untuk perangkat yang dibawa dari luar negeri.</p>',
                'is_active' => true,
                'rating' => 5,
            ],
        ];

        foreach ($materials as $material) {
            Material::create($material);
        }
    }
}
