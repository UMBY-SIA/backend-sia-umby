<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAkPangkatpegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peg.ak_pangkatpegawai', function (Blueprint $table) {
            $table->integer('idpangkatpegawai');
            $table->primary('idpangkatpegawai');
            $table->char('kodepangkat');
            $table->string('nip',20);
            $table->date('tglmulaipangkat')->nullable();
            $table->integer('isaktif')->nullable();
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
        Schema::dropIfExists('ak_pangkatpegawai');
    }
}
