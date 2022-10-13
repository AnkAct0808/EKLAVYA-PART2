<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManageprosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('managepros', function (Blueprint $table) {
            $table->id();
            $table->productname();
            $table->categoryname();
            $table->subcategory();
            $table->measurment();
            $table->stock();
            $table->availability();
            $table->image();
            $table->discription();
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
        Schema::dropIfExists('managepros');
    }
}
