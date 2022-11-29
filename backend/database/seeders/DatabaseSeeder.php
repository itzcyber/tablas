<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Seeders\SensorSeeder;
use Database\Seeders\LocationSeeder;
use Database\Seeders\EnterpriseSeeder;
use Database\Seeders\SensorDataSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(EnterpriseSeeder::class);
         $this->call(LocationSeeder::class);
         $this->call(SensorSeeder::class);
         $this->call(SensorDataSeeder::class);
    }
}
