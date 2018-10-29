<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLabresultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('labresults', function (Blueprint $table) {
            $table->increments('resultId');
            $table->integer('testId');
            $table->integer('labtechId');
            $table->integer('testPatId');
            $table->string('testresults');
            $table->integer('tstatus')->default('2');
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
        Schema::dropIfExists('labresults');
    }
}
