<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeKeluargaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peg.pe_keluarga', function (Blueprint $table) {
            $table->string('jeniskeluarga');
            $table->primary('jeniskeluarga');
            $table->string('nip',20);
            $table->integer('nokeluarga');
            $table->string('nama')->nullable();
            $table->integer('sex')->nullable();
            $table->string('tmplahir')->nullable();
            $table->date('tgllahir')->nullable();
            $table->date('tglnikah')->nullable();
            $table->string('pekerjaan')->nullable();
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
        Schema::dropIfExists('pe_keluarga');
    }
}
