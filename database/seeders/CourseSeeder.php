<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::create([
            'name' => 'Best Brand Selection',
            'image' => 'best-brand-selection.jpg',
            'desc' => 'Increase your professional skill and design world class interactive dashboard in just two days! Benefit: Mengevaluasi kondisi eksisting kantor cabang pada masing - masing daerah/kota, Plotting tingkat efisiensi Unit Bisnis, Mengukur preferensi pengusaha dan konsumen atas alternatif lokasi',
            'lecture' => '6',
            'quiz' => '6',
            'duration' => '24',
            'language' => 'Indonesia',
            'location' => 'Papandayan Hotel, Bandung, Jawa Barat, Indonesia',
            'certificate' => '1',
            'offline_id' => '1',
        ]);

        Course::create([
            'name' => 'Brand Equity Research',
            'image' => 'brand-equity-research.jpg',
            'desc' => 'Benefit: Mengetahui sejauh mana posisi Brand Awareness untuk produk/merek, Mengetahui presepsi konsumen/calon konsumen terhadap brand produk kita, Memberikan strategi yang tepat bagi perusahaan dalam persaingan merek',
            'lecture' => '3',
            'quiz' => '3',
            'duration' => '24',
            'language' => 'Indonesia',
            'location' => 'Hotel Amaris, Bogor, Jawa Barat, Indonesia',
            'certificate' => '1',
            'offline_id' => '2',
        ]);

        Course::create([
            'name' => 'Business Forecasting Technique',
            'image' => 'business-forecasting-technique.jpg',
            'desc' => 'Benefit: Menentukan proyeksi yang akurat, Menentukan proyeksi komposisi yang tepat, Melakukan proyeksi dengan metode smoothing, Melakukan proyeksi dengan metode dekomposisi',
            'lecture' => '5',
            'quiz' => '5',
            'duration' => '24',
            'language' => 'Indonesia',
            'location' => 'Padma Hotel, Bandung, Jawa Barat, Indonesia',
            'certificate' => '1',
            'offline_id' => '3',
        ]);

        Course::create([
            'name' => 'Customer Loyalty Survey',
            'image' => 'customer-loyalty-survey.jpg',
            'desc' => 'Benefit: Memahami teknik untuk melakukan dan mengelola riset loyalitas pelanggan, Melakukan evaluasi/analisa data untuk melihat tingkat loyalitas pelanggan, Menginterpretasi hasil pengukuran loyalitas pelanggan',
            'lecture' => '3',
            'quiz' => '3',
            'duration' => '24',
            'language' => 'Indonesia',
            'location' => 'Novotel Hotel, Bogor, Jawa Barat, Indonesia',
            'certificate' => '1',
            'offline_id' => '4',
        ]);

        Course::create([
            'name' => 'Non-Performing Loan',
            'image' => 'non-performing-loan.jpg',
            'desc' => 'Benefit: Memberikan pemahaman kepada peserta mengenai faktor-faktor yang mempengaruhi tingginya NPL perbankan, Mengidentifikasi faktor-faktor yang berdampak pada kegiatan bisnis kredit bermasalah & macet',
            'lecture' => '4',
            'quiz' => '4',
            'duration' => '24',
            'language' => 'Indonesia',
            'location' => 'Papandayan Hotel, Bandung, Jawa Barat, Indonesia',
            'certificate' => '1',
            'offline_id' => '5',
        ]);
    }
}
