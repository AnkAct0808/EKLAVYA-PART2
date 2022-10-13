<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promos', function (Blueprint $table) {
            $table->id();
            $table->promocode();
            $table->message();
            $table->startdate();
            $table->enddate();
            $table->noofuser();
            $table->minimumorderamount();
            $table->discount();
            $table->discounttype();
            $table->maximum();
            $table->discountamount();
            $table->maximumdiscountamount();
            $table->repeatusage();
            $table->noofrepeatusage();
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
        Schema::dropIfExists('promos');
    }
}
