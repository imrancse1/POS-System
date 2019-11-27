<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmergencyCommunicationAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emergency_communication_address', function (Blueprint $table) {
            $table->increments('emergency_communication_address_id');
            $table->integer('personal_info_id');
            $table->tinyInteger('country_id');
            $table->tinyInteger('division_id');
            $table->integer('city_id');
            $table->string('emg_comm_village')->nullable();
            $table->string('emg_comm_post_office')->nullable();
            $table->string('emg_comm_upzila')->nullable();
            $table->integer('emg_comm_mob_number')->nullable();
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
        Schema::dropIfExists('emergency_communication_address');
    }
}
