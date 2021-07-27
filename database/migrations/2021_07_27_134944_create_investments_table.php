<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvestmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("investmentplan");
            $table->string("investmentpercent");
            $table->string("investmentdate");
            $table->string("investmentduration");
            $table->string("investmentprofit");
            $table->string("investmenttotalProfit");
            $table->string("investmentmaturitydate");
            $table->string("investmentamount");
            $table->string("investmentStatus");
            $table->string("stage");
            $table->string("userid");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('investments');
    }
}
