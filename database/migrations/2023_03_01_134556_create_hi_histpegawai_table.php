<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHiHistpegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peg.hi_histpegawai', function (Blueprint $table) {
            $table->integer('idhistpegawai');
            $table->primary('idhistpegawai');
            $table->string('kodehistori')->nullable();
            $table->string('dataasal')->nullable();
            $table->string('dataubah')->nullable();
            $table->string('nip')->nullable();
            $table->string('nama')->nullable();
            $table->string('t_updateuser2')->nullable();
            $table->string('t_updateip')->nullable();
            $table->timestamp('t_updatetime2')->nullable();
            $table->string('t_updateact2')->nullable();
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
        Schema::dropIfExists('hi_histpegawai');
    }
}
