<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('order_goods', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("product_id")->comment("货品id");
            $table->integer("order_id")->comment("订单id");
            $table->integer("goods_num")->comment("商品数量");
            $table->decimal("goods_price",10,2)->comment("商品单价");
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
        //
        Schema::dropIfExists('order_goods');
    }
}
