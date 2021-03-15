<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClosingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('closing', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('FU_id');
            $table->bigInteger('product_id');
            $table->dateTime('date');
            $table->bigInteger('qty');
            $table->bigInteger('final_price');
            $table->string('closing_type');
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
        Schema::dropIfExists('closing');
    }
}
