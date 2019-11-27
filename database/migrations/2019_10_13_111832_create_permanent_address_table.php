<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermanentAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permanent_address', function (Blueprint $table) {
            $table->increments('permanent_address_id');
            $table->integer('personal_info_id');
            $table->tinyInteger('country_id');
            $table->tinyInteger('division_id');
            $table->integer('city_id');
            $table->string('permanent_village')->nullable();
            $table->string('permanent_post_office')->nullable();
            $table->string('permanent_upzila')->nullable();
            $table->tinyInteger('status')->default(1)->comment('0=>inactive,1=>active,2=>delete');
            $table->timestamps();
            $table->integer('created_by')->unsigned();
            $table->integer('updated_by')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permanent_address');
    }
}
