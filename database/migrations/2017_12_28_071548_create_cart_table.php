<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('cart', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id')->comment("产品id");
            $table->unsignedInteger('num')->comment("商品数量");
        
            $table->unsignedInteger("user_id")->comment("用户id");
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
       Schema::dropIfExists('cart');
    }
}
