<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class SensorDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *+
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 50 ; $i++) { 

            DB::table('sensordatas')->insert([
                'date_time' => Carbon::today()->subDays(rand(0,179))->addSeconds(rand(0,86400))->format('Y-m-d h:i:s') , 
                'value' => rand(0,100),
                'sensors_id' => random_int(1,10),
            ]);
        }

    }
}
