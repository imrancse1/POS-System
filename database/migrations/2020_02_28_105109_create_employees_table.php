<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('employee_id');
            $table->integer('vendor_id');
            $table->string('employee_name');
            $table->string('employee_phone');
            $table->string('employee_code');
            // $table->string('employee_area');
            $table->string('employee_zone');
            $table->string('employee_designation');
            $table->string('employee_target_set');
            $table->string('employee_sales_history');
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
        Schema::dropIfExists('employees');
    }
}
