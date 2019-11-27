<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Foundation\Auth\User;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('full_name');
            $table->string('father_name')->nullable();
            $table->string('name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('profile_image')->nullable();
            $table->text('present_address')->nullable();
            $table->text('permanent_address')->nullable();
            $table->string('mobile_no', 15)->nullable();
            $table->tinyInteger('gender')->default(1);
            $table->date('dob')->nullable();
            $table->string('email', 100)->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->tinyInteger('status')->default(1)->comment('0=>Inactive,1=Active,2=Deleted');
            $table->tinyInteger('user_type')->default(1)->comment('1=>Admin,2=Employee');
            $table->rememberToken();
            $table->timestamps();
            $table->integer('created_by')->unsigned();
            $table->integer('updated_by')->unsigned()->nullable();
        });

        //Restore data
        if (file_exists(dirname(__FILE__) . '/old_data/CreateUsersTable.tbl')) {
            $data = file_get_contents(dirname(__FILE__) . '/old_data/CreateUsersTable.tbl');
            $data = json_decode($data, true);
            if (is_array($data) && count($data) > 0) {
                $tableData = [];
                foreach ($data as $key => $value) {
                    $tableData [] = $value;
                }
                \Illuminate\Support\Facades\DB::table('users')->insert($tableData);
            }
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Backup Data
        $data = \Illuminate\Support\Facades\DB::table('users')->get()->toJson();
        file_put_contents(dirname(__FILE__) . '/old_data/CreateUsersTable.tbl', $data);

        Schema::dropIfExists('users');
    }
}
