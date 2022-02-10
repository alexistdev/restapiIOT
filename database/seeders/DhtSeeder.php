<?php

namespace Database\Seeders;

use App\Models\Dht;
use App\Models\Soil;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class DhtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        Dht::factory(1)->withLab()->create();
        $dht = array(
            'lab_id' => 1,
            'token' => 'PB94TBgxytCvtmKv',
            'suhu_udara' => 0,
            'kelembaban_udara' => 0,
            'mode' => 1,
            'status' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        );
        Dht::insert($dht);
    }
}
