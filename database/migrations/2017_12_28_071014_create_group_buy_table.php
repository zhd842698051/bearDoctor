<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupBuyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('group_buy', function (Blueprint $table) {
            $table->increments('id');
            $table->string("title",30)->comment("标题");
            $table->integer("store_nums")->comment("库存量");
            $table->integer("sum_count")->comment("已售数量");
            $table->string("descript",255)->comment("介绍");
            $table->integer("goods_id")->comment("商品id");
            $table->integer("saller")->comment("团购人数");
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
        Schema::dropIfExists('group_buy');
    }
}
