<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gate.sc_menu', function (Blueprint $table) {
            $table->integer('idmenu');
            $table->primary('idmenu');
            $table->unsignedBigInteger('idmenuparent')->nullable();
            $table->string('kodemodul',15)->nullable();
            $table->string('namamenu',100)->nullable();
            $table->string('namafile',100)->nullable();
            $table->integer('levelmenu')->nullable();
            $table->string('urladd',100)->nullable();
            $table->integer('idx')->nullable();
            $table->integer('isactive')->nullable();
            $table->integer('infoleft')->nullable();
            $table->integer('inforight')->nullable();
            $table->integer('istampil')->nullable();
            $table->string('keterangan',200)->nullable();
            $table->string('t_updateuser',30)->nullable();
            $table->string('t_updateip',30)->nullable();
            $table->foreign('idmenuparent')->references('idmenu')->on('gate.sc_menu');
            $table->foreign('kodemodul')->references('kodemodul')->on('gate.sc_modul');
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
        Schema::dropIfExists('sc_menu');
    }
}
