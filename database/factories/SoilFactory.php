<?php

namespace Database\Factories;

use App\Models\Dht;
use App\Models\Lab;
use App\Models\Soil;
use Illuminate\Database\Eloquent\Factories\Factory;

class SoilFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'token' => 'CRK123xytCvtmKv',
            'ph_tanah' => '0',
            'kelembaban_tanah' => '0',
            'mode' => 1,
            'status' => 1
        ];
    }

    public function withLab(): Static
    {
        return $this->afterMaking(function (Soil $soil) {
            $lab = Lab::query()->find(1);
            $soil->lab()->associate($lab);
        });
    }
}
