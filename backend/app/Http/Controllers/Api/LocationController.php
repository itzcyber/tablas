<?php

namespace App\Http\Controllers\Api;

use App\Models\Location;
use App\Models\Enterprise;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LocationController extends Controller
{
    public function locations()
    {
        $locations = Location::all();

        return response()->json($locations);

    }

    public function locationEnt($id)
    {
        $lfe = Location::where('enterprises_id', $id)->get();
        return response()->json($lfe);
    }
}
