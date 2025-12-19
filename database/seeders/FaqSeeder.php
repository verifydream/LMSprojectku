<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faqs = [
            [
                'question' => 'Apa itu Impor?',
                'answer' => '<p>Impor adalah kegiatan memasukkan barang dari luar negeri ke dalam daerah pabean Indonesia. Kegiatan ini diatur oleh Undang-Undang Kepabeanan dan memerlukan berbagai dokumen serta prosedur yang harus dipenuhi oleh importir.</p>',
                'is_active' => true,
                'order' => 1,
            ],
            [
                'question' => 'Bagaimana cara melakukan ekspor?',
                'answer' => '<p>Untuk melakukan ekspor, eksportir harus: 1) Memiliki NPWP, 2) Memiliki identitas perusahaan yang sah, 3) Mendaftarkan diri sebagai eksportir, 4) Mempersiapkan dokumen ekspor seperti invoice, packing list, dan dokumen pendukung lainnya, 5) Mengurus bea keluar jika diperlukan.</p>',
                'is_active' => true,
                'order' => 2,
            ],
            [
                'question' => 'Apa saja barang kena cukai?',
                'answer' => '<p>Barang kena cukai meliputi: 1) Etil alkohol atau etanol, 2) Minuman mengandung etil alkohol, 3) Hasil tembakau (rokok, cerutu, dll). Barang-barang ini dikenakan cukai karena memiliki sifat dan karakteristik yang perlu pembatasan dan pengawasan.</p>',
                'is_active' => true,
                'order' => 3,
            ],
            [
                'question' => 'Bagaimana cara registrasi IMEI?',
                'answer' => '<p>Registrasi IMEI dapat dilakukan melalui aplikasi Beacukai Mobile atau situs web Bea Cukai. Pengguna perlu menyiapkan dokumen seperti paspor, boarding pass, dan nomor IMEI perangkat. Registrasi harus dilakukan dalam waktu 60 hari setelah kedatangan di Indonesia.</p>',
                'is_active' => true,
                'order' => 4,
            ],
            [
                'question' => 'Berapa lama proses kepabeanan?',
                'answer' => '<p>Proses kepabeanan bervariasi tergantung jenis barang dan kelengkapan dokumen. Untuk jalur hijau (tanpa pemeriksaan fisik), proses bisa selesai dalam 30 menit. Untuk jalur merah (dengan pemeriksaan), bisa memakan waktu beberapa jam hingga beberapa hari tergantung kompleksitas pemeriksaan.</p>',
                'is_active' => true,
                'order' => 5,
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }
    }
}
