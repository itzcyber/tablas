<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SensorData;
use Illuminate\Http\Request;

class SensorDataController extends Controller
{
    public function sensorDatas()
    {
        $sensorDatas = SensorData::all();

        return response()->json($sensorDatas);

    }

    public function dataSen($id)
    {
        $lfds = SensorData::where('sensors_id', $id)->get();
        return response()->json($lfds);
    }

    public function filter_by_date(Request $request)
    {
        //dd($request->all());
        // $startDate = $startDate." 00:00:00"; // YYYY-MM-DD HH:mm:ss
        // $endDate = $endDate." 23:59:59";

        $start = $request->start_date." 00:00:00";
        $end = $request->end_date." 23:59:59";
        //$registers = SensorData::where('sensors_id',$request->sensors_id)->whereBetween('date',[$request->start_date,$request->end_date])->get();
        $registers = SensorData::where('sensors_id',$request->sensors_id)->whereRaw("date_time BETWEEN '{$start}' and '{$end}'")->get();


        //$registers = SensorData::where('sensors_id',$request->sensors_id)->whereRaw("'CONCAT(sensordatas.date,' ',sensordatas.time)' BETWEEN '?' and '?'",[$request->start_date." 00:00:00",$request->end_date." 23:59:59"])->get();

        return response()->json($registers);
    }

    public function chupala($sensor_id){
        dd("la has chupado",$sensor_id);
    }

}

