<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensordatas', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('date_time');
            $table->string('value',255)->nullable();
            $table->timestamps();
            $table->integer('sensors_id')->unsigned();

            $table->foreign("sensors_id")
            ->references('id')
            ->on('sensors');
            
        });

        // Schema::table('sensordatas',function($table)
        // {
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('SensorDatas');
    }
};
