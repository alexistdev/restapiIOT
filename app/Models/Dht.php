<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Dht extends Model
{
    use HasFactory;
    protected $fillable = ['token','suhu_udara','kelembaban_udara'];

    public function lab()
    {
        $this->belongsTo(Lab::class);
    }

    public function getUpdatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d-m-Y H:i:s');
    }
}
