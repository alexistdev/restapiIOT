<?php

namespace Database\Seeders;

use App\Models\Soil;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class SoilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        Soil::factory(1)->withLab()->create();
        $soil = array(
            'lab_id' => 1,
            'token' => 'CRK123xytCvtm',
            'ph_tanah' => 0,
            'kelembaban_tanah' => 0,
            'mode' => 1,
            'status' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        );
        Soil::insert($soil);
    }
}
