<?php

namespace Database\Seeders;

use App\Models\Offline;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OfflineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Offline::create([
            'cost' => '1123123',
            'start_date' => '2015-12-7',
            'end_date' => '2015-12-8',
        ]);

        Offline::create([
            'cost' => '1123123',
            'start_date' => '2016-3-14',
            'end_date' => '2016-3-15',
        ]);

        Offline::create([
            'cost' => '1123123',
            'start_date' => '2016-1-11',
            'end_date' => '2016-1-12',
        ]);

        Offline::create([
            'cost' => '1123123',
            'start_date' => '2016-4-13',
            'end_date' => '2016-4-14',
        ]);

        Offline::create([
            'cost' => '1123123',
            'start_date' => '2016-2-1',
            'end_date' => '2016-2-2',
        ]);
    }
}
