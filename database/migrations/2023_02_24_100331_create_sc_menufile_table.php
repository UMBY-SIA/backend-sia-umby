<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScMenufileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gate.sc_menufile', function (Blueprint $table) {
            $table->integer('idmenu');
            $table->string('filemenu',100)->nullable();
            $table->string('t_updateuser',30)->nullable();
            $table->string('t_updateip',30)->nullable();
            $table->foreign('idmenu')->references('idmenu')->on('gate.sc_menu');
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
        Schema::dropIfExists('sc_menufile');
    }
}
