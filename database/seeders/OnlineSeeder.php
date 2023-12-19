<?php

namespace Database\Seeders;

use App\Models\Online;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OnlineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Online::create([
            'cost' => '1123123',
            'start_date' => '2023-09-14',
            'end_date' => '2023-09-14',
        ]);
    }
}
