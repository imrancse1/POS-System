<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_infos', function (Blueprint $table) {
            $table->increments('personal_info_id');
            $table->string('name');
            $table->integer('mobile_number')->nullable();
            $table->string('father_name')->nullable();
            $table->integer('father_mobile_number')->nullable();
            $table->string('mother_name')->nullable();
            $table->integer('mother_mobile_number')->nullable();
            $table->string('education_qualification')->nullable();
            $table->string('religion')->nullable();
            $table->date('dob')->nullable();
            $table->float('total_year')->nullable();
            $table->integer('national_id')->nullable();
            $table->tinyInteger('marital_status')->nullable();
            $table->tinyInteger('no_of_child')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('personal_infos');
    }
}
