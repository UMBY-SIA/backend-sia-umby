<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSqlerrorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log.sqlerror', function (Blueprint $table) {
            $table->integer('idlog');
            $table->primary('idlog');
            $table->text('sql')->nullable();
            $table->text('error')->nullable();
            $table->text('url')->nullable();
            $table->text('post')->nullable();
            $table->string('tipaddress')->nullable();
            $table->timestamp('tinserttime')->nullable();
            $table->string('tusername')->nullable();
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
        Schema::dropIfExists('sqlerror');
    }
}
