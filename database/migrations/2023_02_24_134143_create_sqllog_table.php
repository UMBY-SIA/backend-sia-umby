<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSqllogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log.sqllog', function (Blueprint $table) {
            $table->integer('idlog');
            $table->primary('idlog');
            $table->string('tablename',100)->nullable();
            $table->text('sql')->nullable();
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
        Schema::dropIfExists('sqllog');
    }
}
