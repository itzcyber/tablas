<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Sensor;
use Illuminate\Http\Request;

class SensorController extends Controller
{
    public function sensors()
    {
        $sensors = Sensor::all();

        return response()->json($sensors);

    }

    public function sensorLoc($id)
    {
        $lfs = Sensor::where('locations_id', $id)->get();
        return response()->json($lfs);
    }

}
