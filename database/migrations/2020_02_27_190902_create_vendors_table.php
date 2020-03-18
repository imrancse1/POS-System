<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->increments('vendor_id');
            $table->string('vendor_name');
            $table->string('vendor_phone');
            $table->string('vendor_address');
            $table->string('code')->unique();
            $table->string('vendor_area');
            $table->string('vendor_zone');
            $table->string('vendor_target_set_month');
            $table->string('vendor_target_set_yearly');
            $table->string('vendor_total_month_report');
            $table->integer('credit');
            $table->string('set_commission');
            $table->string('opening_account');
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
        Schema::dropIfExists('vendors');
    }
}
