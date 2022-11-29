<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    use HasFactory;


    protected $fillable = ['id','name','locations_id'];
    

    public function Location()
    {
        return $this->belongsTo(Location::class);
    }

    public function SensorData()
    {
        return $this->hasMany(SensorData::class);
    }

}
