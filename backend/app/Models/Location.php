<?php

namespace App\Models;

use App\Models\enterprise;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model
{
    use HasFactory;

    protected $fillable = ['id','name', 'enterprises_id'];
    
    public function Enterprise()
    {
        return $this->belongsTo(Enterprise::class);
    }

    public function Sensor()
    {
        return $this->hasMany(Sensor::class);
    }

}
