<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanydetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companydetails', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("aboutTitle")->nullable();
            $table->string("aboutText")->nullable();
            $table->string("companyName")->nullable();
            $table->string("runningDays")->nullable();
            $table->string("companyEmail")->nullable();
            $table->string("companyLocation")->nullable();
            $table->string("companyPhone")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companydetails');
    }
}
