<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScUserlogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gate.sc_userlog', function (Blueprint $table) {
            $table->integer('idlog');
            $table->primary('idlog');
            $table->integer('iduser');
            $table->string('keterangan',200);
            $table->string('predata');
            $table->string('t_updateuser',30)->nullable();
            $table->string('t_updateip',30)->nullable();
            $table->timestamps();
            $table->string('t_updateact',30)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sc_userlog');
    }
}
