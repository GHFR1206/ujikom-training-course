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
            'desc' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Hic quaerat rerum totam unde. Dolorem autem quibusdam vero eligendi laborum distinctio aspernatur incidunt laboriosam perspiciatis libero labore harum maiores fugiat magnam adipisci odit tempora doloremque veritatis velit consequatur praesentium, voluptatum eum.',
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
            'desc' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Hic quaerat rerum totam unde. Dolorem autem quibusdam vero eligendi laborum distinctio aspernatur incidunt laboriosam perspiciatis libero labore harum maiores fugiat magnam adipisci odit tempora doloremque veritatis velit consequatur praesentium, voluptatum eum.',
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
            'desc' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Hic quaerat rerum totam unde. Dolorem autem quibusdam vero eligendi laborum distinctio aspernatur incidunt laboriosam perspiciatis libero labore harum maiores fugiat magnam adipisci odit tempora doloremque veritatis velit consequatur praesentium, voluptatum eum.',
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
            'desc' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Hic quaerat rerum totam unde. Dolorem autem quibusdam vero eligendi laborum distinctio aspernatur incidunt laboriosam perspiciatis libero labore harum maiores fugiat magnam adipisci odit tempora doloremque veritatis velit consequatur praesentium, voluptatum eum.',
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
            'desc' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Hic quaerat rerum totam unde. Dolorem autem quibusdam vero eligendi laborum distinctio aspernatur incidunt laboriosam perspiciatis libero labore harum maiores fugiat magnam adipisci odit tempora doloremque veritatis velit consequatur praesentium, voluptatum eum.',
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
