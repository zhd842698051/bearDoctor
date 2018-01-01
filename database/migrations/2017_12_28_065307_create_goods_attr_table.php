<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsAttrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_attr', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('goods_id')->comment("商品id");
            $table->unsignedInteger('attr_id')->comment("属性id");
            $table->unsignedInteger('attribute_id')->comment("属性值id");
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
        Schema::dropIfExists('goods_attr');
    }
}
