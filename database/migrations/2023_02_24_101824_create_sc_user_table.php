<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gate.sc_user', function (Blueprint $table) {
            $table->bigInteger('userid');
            $table->primary('userid');
            $table->string('username',100)->nullable();
            $table->string('userdesc',100)->nullable();
            $table->string('password',32)->nullable();
            $table->string('email',100)->nullable();
            $table->string('hints')->nullable();
            $table->boolean('isactive')->nullable();
            $table->string('lastlogintime',30)->nullable();
            $table->string('lastloginip',30)->nullable();
            $table->string('salt',100)->nullable();
            $table->timestamp('tglgantipassword');
            $table->string('t_updateuser',30)->nullable();
            $table->string('t_updateip',30)->nullable();
            $table->timestamps();
            $table->string('t_updateact',30)->nullable();
            $table->string('reffsialama')->nullable();
            $table->string('passwordold',32)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sc_user');
    }
}
