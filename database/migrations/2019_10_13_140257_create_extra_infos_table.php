<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExtraInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extra_infos', function (Blueprint $table) {
            $table->increments('extra_info_id');
            $table->integer('personal_info_id');
            $table->string('chairman_name')->nullable();
            $table->integer('chairman_m_number')->nullable();
            $table->string('member_name')->nullable();
            $table->integer('member_m_number')->nullable();
            $table->tinyInteger('allegation_inthana');
            $table->text('give_reason')->nullable();
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
        Schema::dropIfExists('extra_infos');
    }
}
