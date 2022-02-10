<?php

namespace Database\Factories;

use App\Models\Dht;
use App\Models\Lab;
use Illuminate\Database\Eloquent\Factories\Factory;

class DhtFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'token' => 'PB94TBgxytCvtmKv',
            'suhu_udara' => '0',
            'kelembaban_udara' => '0',
            'mode' => 1,
            'status' => 1
        ];
    }

    public function withLab(): Static
    {
        return $this->afterMaking(function (Dht $dht) {
            $lab = Lab::query()->find(1);
            $dht->lab()->associate($lab);
//            $lab = Lab::query()->find(1);
//            $dht->lab()->associate($lab);
        });
    }

}
