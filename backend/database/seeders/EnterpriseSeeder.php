<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EnterpriseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $letter = 'A';

        for ($i=0; $i < 5 ; $i++) { 
            
            DB::table('enterprises')->insert([
                'name' => 'Empresa '.$letter  
            ]);

            $letter++;
        }
    }
}
