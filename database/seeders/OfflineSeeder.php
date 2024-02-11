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
            'cost' => '1000000',
            'start_date' => '2015-12-07',
            'end_date' => '2015-12-08',
        ]);

        Offline::create([
            'cost' => '1500000',
            'start_date' => '2016-03-14',
            'end_date' => '2016-03-15',
        ]);

        Offline::create([
            'cost' => '1200000',
            'start_date' => '2016-01-11',
            'end_date' => '2016-01-12',
        ]);

        Offline::create([
            'cost' => '1450000',
            'start_date' => '2016-04-13',
            'end_date' => '2016-04-14',
        ]);

        Offline::create([
            'cost' => '1100000',
            'start_date' => '2016-02-01',
            'end_date' => '2016-02-02',
        ]);
    }
}
