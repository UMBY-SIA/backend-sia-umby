<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAkPendidikanpegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peg.ak_pendidikanpegawai', function (Blueprint $table) {
            $table->integer('nopendidikan');
            $table->primary('nopendidikan');
            $table->string('kodependidikan',5);
            $table->string('nip',20);
            $table->string('namapt');
            $table->string('jurusanpt');
            $table->integer('tahunlulus');
            $table->string('asalpt',50);
            $table->string('keterangansem',50);
            $table->string('t_updateuser',30);
            $table->string('t_updateip',6);
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
        Schema::dropIfExists('ak_pendidikanpegawai');
    }
}
