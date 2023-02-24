<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKrusialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log.krusial', function (Blueprint $table) {
            $table->integer('idlog');
            $table->primary('idlog');
            $table->string('tablename',100)->nullable();
            $table->text('oldvalues')->nullable();
            $table->text('newvalues')->nullable();
            $table->text('controlleraccess')->nullable();
            $table->string('tipaddress',50)->nullable();
            $table->timestamp('tinserttime')->nullable();
            $table->string('tusername',50)->nullable();
            $table->text('callstack')->nullable();
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
        Schema::dropIfExists('krusial');
    }
}
