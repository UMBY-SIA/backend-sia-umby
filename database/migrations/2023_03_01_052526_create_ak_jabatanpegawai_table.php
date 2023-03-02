<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAkJabatanpegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peg.ak_jabatanpegawai', function (Blueprint $table) {
            $table->integer('ak_jabatanpegawai');
            $table->string('nip',20)->nullable();
            $table->integer('idjabatan')->nullable();
            $table->string('kodeunit',10)->nullable();
            $table->date('tglmulaijabatan');
            $table->string('noskjabatan',25);
            $table->integer('isaktif');
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
        Schema::dropIfExists('ak_jabatanpegawai');
    }
}
