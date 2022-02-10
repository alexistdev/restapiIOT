<?php

namespace Database\Factories;

use App\Models\Lab;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;


class LabFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => "LAB -{$this->faker->randomDigit()}",
            'token' => 'PB94TBgxytCvtmKv',
            'ph_tanah' => '25',
            'kelembaban' => '75',
        ];
    }

    public function withUser(): Static
    {
        return $this->afterMaking(function (Lab $lab){
            $user = User::query()->find(1);
            $lab->user()->associate($user);
        });
    }
}
