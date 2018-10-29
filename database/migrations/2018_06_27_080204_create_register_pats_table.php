<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegisterPatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('register_pats', function (Blueprint $table) {
            $table->increments('PatientId');
            $table->string('FullName');
            $table->integer('idNo');
            $table->integer('Tel');
            $table->integer('yob');
            $table->integer('empId');
            $table->string('place');
            $table->string('gender');
            $table->string('mStatus');
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
        Schema::dropIfExists('register_pats');
    }
}
