<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMsPegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peg.ms_pegawai', function (Blueprint $table) {
            $table->string('nip');
            $table->primary('nip');
            $table->string('kodeunit')->nullable();
            $table->string('nama')->nullable();
            $table->string('gelardepan')->nullable();
            $table->string('gelarbelakang')->nullable();
            $table->integer('sex')->nullable();
            $table->string('tmplahir')->nullable();
            $table->date('tgllahir')->nullable();
            $table->string('goldarah')->nullable();
            $table->string('alamat')->nullable();
            $table->integer('kodepos')->nullable();
            $table->string('telp')->nullable();
            $table->string('telp2')->nullable();
            $table->string('hp')->nullable();
            $table->string('hp2')->nullable();
            $table->string('email')->nullable();
            $table->string('email2')->nullable();
            $table->string('noktp')->nullable();
            $table->string('npwp')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('kecamatan')->nullable();
            $table->integer('tinggibadan')->nullable();
            $table->integer('beratbadan')->nullable();
            $table->string('cacattubuh')->nullable();
            $table->string('hobi')->nullable();
            $table->string('noskkelbaik')->nullable();
            $table->date('tglskkelbaik')->nullable();
            $table->string('pejabatskkelbaik')->nullable();
            $table->string('nosksehat')->nullable();
            $table->date('tglsksehat')->nullable();
            $table->string('pejabatsksehat')->nullable();
            $table->string('nidn',10)->nullable();
            $table->string('nidnnew',10)->nullable();
            $table->string('kodependapatan')->nullable();
            $table->integer('kodekota')->nullable();
            $table->string('statustetap')->nullable();
            $table->string('kodeagama')->nullable();
            $table->string('kodewn')->nullable();
            $table->string('tipepeg')->nullable();
            $table->string('statuspeg')->nullable();
            $table->string('statusnikah')->nullable();
            $table->string('kodepekrjstrisuami')->nullable();
            $table->string('namaistrisuami')->nullable();
            $table->string('namaanak1')->nullable();
            $table->string('namaanak2')->nullable();
            $table->date('tgllahiristrisuami')->nullable();
            $table->date('tgllahiranak1')->nullable();
            $table->date('tgllahiranak2')->nullable();
            $table->integer('jeniskelaministrisuami')->nullable();
            $table->integer('jeniskelaminanak1')->nullable();
            $table->integer('jeniskelaminanak2')->nullable();
            $table->string('norekening')->nullable();
            $table->string('namabank')->nullable();
            $table->string('namacabang')->nullable();
            $table->string('catatankhusus')->nullable();
            $table->string('rekatasnama')->nullable();
            $table->string('nik')->nullable();
            $table->string('t_updateuser')->nullable();
            $table->string('t_updateip')->nullable();
            $table->timestamp('t_updatetime')->nullable();
            $table->string('t_updateact')->nullable();
            $table->integer('nilai_toefl')->nullable();
            $table->string('jabstruktural')->nullable();
            $table->string('jabakademik')->nullable();
            $table->string('penddosen')->nullable();
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
        Schema::dropIfExists('ms_pegawai');
    }
}
