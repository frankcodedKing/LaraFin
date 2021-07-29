<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvestmentplansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investmentplans', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("duration");
            $table->string("percentage");
            $table->string("minimum");
            $table->string("maximum");
            $table->string("plan");
            $table->string("repeat")->default(0);
            $table->string("noofrepeat")->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('investmentplans');
    }
}
