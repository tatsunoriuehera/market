<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllMarketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('all_markets', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->integer('total_quantity');
          $table->string('category');
          $table->integer('quantity');
          $table->integer('adachi');
          $table->integer('oota');
          $table->integer('itabashi');
          $table->integer('kasai');
          $table->integer('setagaya');
          $table->date('date');
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
        Schema::dropIfExists('all_markets');
    }
}
