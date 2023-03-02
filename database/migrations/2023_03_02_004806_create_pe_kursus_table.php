<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeKursusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peg.pe_kursus', function (Blueprint $table) {
            $table->string('nip');
            $table->primary('nip');
            $table->integer('nokursus');
            $table->string('namakursus',50)->nullable();
            $table->date('tglmulai')->nullable();
            $table->date('tglselesai')->nullable();
            $table->integer('tahunijasah')->nullable();
            $table->string('tempat')->nullable();
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('pe_kursus');
    }
}
