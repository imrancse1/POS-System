<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWirehousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wirehouses', function (Blueprint $table) {
            $table->increments('wirehouse_id');
            $table->string('wirehouse_name');
            $table->string('wirehouse_address');
            $table->string('wirehouse_discription');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wirehouses');
    }
}
