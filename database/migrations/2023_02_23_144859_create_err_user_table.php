<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateErrUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gate.err_user', function (Blueprint $table) {
            $table->string('userid',25);
            $table->primary('userid');
            $table->char('usertype');
            $table->string('nama',50)->nullable();
            $table->string('kodeunit',6)->nullable();
            $table->string('password',32)->nullable();
            $table->string('hints')->nullable();
            $table->integer('builtin');
            $table->date('expireddate');
            $table->string('t_logintime',30);
            $table->string('t_ipaddress',30);
            $table->string('t_hostname',100);
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
        Schema::dropIfExists('err_user');
    }
}
