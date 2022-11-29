<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sensor;

class SensorData extends Model
{

    use HasFactory;

    protected $fillable = ['id','date_time','value','sensors_id'];
    protected $table = "sensordatas";
    
    public function Sensor()
    {
        return $this->belongsTo(Sensor::class);
    }
}
