<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBanglaFoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bangla_foods', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('category');
            $table->string('product_name');
            $table->string('total_item');
            $table->string('product_price');
            $table->string('item_details');
            $table->string('product_status');
            $table->string('product_image');
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
        Schema::dropIfExists('bangla_foods');
    }
}
