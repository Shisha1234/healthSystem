<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('paymentId');
            $table->integer('F_tions_drugId')->nullable();
            $table->integer('paydrugId')->nullable();
            $table->integer('payPatId')->nullable();
            $table->float('totalAmt')->nullable();
            $table->integer('payMode')->default(0);
            $table->integer('payStatus')->default(0);
            $table->timestamp('payDate')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
