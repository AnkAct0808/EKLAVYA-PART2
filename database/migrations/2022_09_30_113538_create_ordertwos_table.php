<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdertwosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordertwos', function (Blueprint $table) {
            $table->id();
            $table->orderid();
            $table->name();
            $table->number();
            $table->subtotal();
            $table->dcharge();
             $table->total();
             $table->paymentmethod();
             $table->status();
             $table->activestatus();
             $table->orderdate();
            
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
        Schema::dropIfExists('ordertwos');
    }
}
