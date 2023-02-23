<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMsCapaianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gate.ms_capaian', function (Blueprint $table) {
            $table->integer('idcapaian');
            $table->primary('idcapaian');
            $table->string('kodeunit',10);
            $table->string('namacapaian',100);
            $table->string('namacapaianen',100);
            $table->foreign('kodeunit')->references('kodeunit')->on('gate.ms_unit');
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
        Schema::dropIfExists('ms_capaian');
    }
}
