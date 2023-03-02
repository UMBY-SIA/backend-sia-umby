<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeOrganisasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peg.pe_organisasi', function (Blueprint $table) {
            $table->string('masaorganisasi',10);
            $table->primary('masaorganisasi');
            $table->string('nip')->uniqid();
            $table->integer('noorganisasi');
            $table->string('namaorganisasi')->nullable();
            $table->string('kedudukan')->nullable();
            $table->integer('tahunmulai')->nullable();
            $table->integer('tahunselesai')->nullable();
            $table->string('tempat')->nullable();
            $table->string('namapimpinan')->nullable();
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
        Schema::dropIfExists('pe_organisasi');
    }
}
