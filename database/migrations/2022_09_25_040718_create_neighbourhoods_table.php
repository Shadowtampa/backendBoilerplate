<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNeighbourhoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('neighbourhoods', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string("name");
            $table->unsignedBigInteger('city_id');
 
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('neighbourhoods');
    }
}
