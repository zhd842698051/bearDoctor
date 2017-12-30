<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50)->comment("商品名称");
            $table->decimal('sell_price',10,2)->comment("销售价格");
            $table->decimal('promotion_price',10,2)->comment("促销价格");
            $table->integer('category_id')->comment("分类id");
            $table->text("descript")->comment("商品描述");
            $table->string("cover",100)->comment("封面图片");
            $table->tinyInteger("is_hot")->comment("是否热销");
            $table->tinyInteger("is_attr")->comment("是否有属性");
            $table->tinyInteger("is_promotion")->comment("是否促销");
            $table->tinyInteger("is_son")->comment("是否上架");
            $table->integer("num")->default(0)->comment("库存");
            $table->integer("sell_num")->default(0)->comment("销量");
            $table->string("keywords")->comment("关键词(,隔开)");
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
        Schema::dropIfExists('goods');
    }
}
