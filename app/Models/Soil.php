<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soil extends Model
{
    use HasFactory;
    protected $fillable =['token','ph_tanah','kelembaban_tanah'];

    public function lab()
    {
        $this->belongsTo(Lab::class);
    }
}
