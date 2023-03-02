<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMsUnitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gate.ms_unit', function (Blueprint $table) {
            $table->string('kodeunit',10);
            $table->primary('kodeunit');
            $table->string('kodeunitparent',10)->nullable();
            $table->string('namaunit',100)->nullable();
            $table->string('namasingkat',50)->nullable();
            $table->integer('levels')->nullable();
            $table->string('gelar',50)->nullable();
            $table->string('programpend',5)->nullable();
            $table->string('kodekampus',10)->nullable();
            $table->integer('bebanstudi')->nullable();
            $table->integer('batasip')->nullable();
            $table->integer('prosentasecmax')->nullable();
            $table->integer('toeflmin')->nullable();
            $table->integer('cutimax')->nullable();
            $table->string('keterangan',200)->nullable();
            $table->integer('urutan')->nullable();
            $table->integer('infoleft')->nullable();
            $table->integer('inforight')->nullable();
            $table->integer('isaktif')->nullable();
            $table->string('nipketua',20)->nullable();
            $table->string('namauniten',100)->nullable();
            $table->string('gelaren',50)->nullable();
            $table->string('noskdikti',150)->nullable();
            $table->string('tglskdikti',20)->nullable();
            $table->string('noskbanpt',150)->nullable();
            $table->string('tglskbanpt',20)->nullable();
            $table->string('kodeakreditasi',4)->nullable();
            $table->string('telp',50)->nullable();
            $table->string('email',100)->nullable();
            $table->string('kodenim',2)->nullable();
            $table->string('t_updateuser',30)->nullable();
            $table->string('t_updateip',30)->nullable();
            $table->timestamps();
            $table->string('t_updateact',30)->nullable();
            $table->string('kodefakultas',2);
            $table->foreign('kodeunitparent')->references('kodeunit')->on('gate.ms_unit');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ms_unit');
    }
}
