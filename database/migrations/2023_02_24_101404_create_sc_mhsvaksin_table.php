<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScMhsvaksinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gate.sc_mhsvaksin', function (Blueprint $table) {
            $table->id();
            $table->string('nim')->nullable();
            $table->string('nama')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('status_vaksin')->nullable();
            $table->date('tglkesediaanvaksin')->nullable();
            $table->string('filesertifikat')->nullable();
            $table->string('filesuratpernyataan');
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
        Schema::dropIfExists('sc_mhsvaksin');
    }
}
