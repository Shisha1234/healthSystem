<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->increments('med_id');
            $table->string('med_name');
            $table->integer('quantity');
            $table->integer('price')->default(0);
            $table->string('manufacturedBy');
            $table->date('mfDate');
            $table->date('expiry_date');
            $table->dateTime('del_avTime');
            $table->integer('pharEmpId');
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
        Schema::dropIfExists('medicines');
    }
}
