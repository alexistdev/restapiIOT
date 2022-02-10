<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Lab extends Model
{
    use HasFactory,HasApiTokens;

    protected $fillable = [
        'name','token','ph_tanah','kelembaban',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function dht()
    {
        return $this->hasOne(Dht::class);
    }

    public function soil()
    {
        return $this->hasOne(Soil::class);
    }

}
