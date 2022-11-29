<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LocationSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $letter = 'A';

        for ($i=0; $i < 10 ; $i++) { 
            
            DB::table('locations')->insert([
                'name' => 'ubicacion '.$letter,
                'enterprises_id' => random_int(1,5)       
                
            ]);
            $letter++;
        }

    }
}
