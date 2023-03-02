<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeKunjunganLuarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peg.pe_kunjunganluar', function (Blueprint $table) {
            $table->string('nip');
            $table->primary('nip');
            $table->string('nokunjungan');
            $table->string('negara')->nullable();
            $table->string('tujuan')->nullable();
            $table->integer('lama')->nullable();
            $table->string('sumberbiaya')->nullable();
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
