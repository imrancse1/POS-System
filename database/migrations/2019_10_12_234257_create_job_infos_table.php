<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_infos', function (Blueprint $table) {
            $table->increments('job_info_id');
            $table->integer('personal_info_id');
            $table->string('job_card_no');
            $table->string('job_designation')->nullable();
            $table->date('job_joining_date')->nullable();
            $table->string('job_section')->nullable();
            $table->string('job_reference_name')->nullable();
            $table->integer('j_mobile_no')->nullable();
            $table->string('job_factory_name')->nullable();
            $table->string('job_exp_designation')->nullable();
            $table->date('from')->nullable();
            $table->date('to')->nullable();
            $table->float('total_year_job_exp')->nullable();
            $table->tinyInteger('status')->default(1)->comment('0=>Inactive, 1=>Active, 2=Delete');
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
        Schema::dropIfExists('job_infos');
    }
}
