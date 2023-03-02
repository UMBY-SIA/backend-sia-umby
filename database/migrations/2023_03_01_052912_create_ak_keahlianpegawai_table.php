<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAkKeahlianpegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peg.ak_keahlianpegawai', function (Blueprint $table) {
            $table->integer('idkeahlianpegawai');
            $table->primary('idkeahlianpegawai');
            $table->string('bidangkeahlian',30);
            $table->string('nip',20);
            $table->integer('levelkeahlian');
            $table->string('t_updateuser',30);
            $table->string('t_updateip',30);
            $table->timestamp('t_updatetime');
            $table->timestamps();
            $table->string('t_updateact2',30);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ak_keahlianpegawai');
    }
}
