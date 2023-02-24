<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScUsersessionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gate.sc_usersession', function (Blueprint $table) {
            $table->integer('userid');
            $table->primary('userid');
            $table->string('sessionid');
            $table->string('username');
            $table->text('sessiondata')->nullable();
            $table->string('t_userid')->nullable();
            $table->string('t_username')->nullable();
            $table->time('t_logintime')->nullable();
            $table->string('t_logouttime',30)->nullable();
            $table->string('t_ipaddress',30)->nullable();
            $table->string('t_hostname',100)->nullable();
            $table->string('t_osname',100)->nullable();
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
        Schema::dropIfExists('sc_usersession');
    }
}
