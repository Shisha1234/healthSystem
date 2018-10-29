<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrechecksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prechecks', function (Blueprint $table) {
            $table->increments('checkId');
            $table->integer('chkPatId');
            $table->integer('chkempId');
            $table->integer('height');
            $table->integer('weight');
            $table->integer('temperature');
            $table->integer('pulseRate');
            $table->integer('chkstatus')->default(1);
            $table->string('bPressure');
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
        Schema::dropIfExists('prechecks');
    }
}
