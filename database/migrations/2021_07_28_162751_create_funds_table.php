<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funds', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("balance");
            $table->string("totaldepost");
            $table->string("pendingdeosit");
            $table->string("pendingwithdrawal");
            $table->string("totalwithdrawal");
            $table->string("currentinvestment");
            $table->string("totalbalnce");
            $table->string("currentprofit");
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
        Schema::dropIfExists('funds');
    }
}
