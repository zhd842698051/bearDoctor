<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('order', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger("order_no")->comment("订单编号");
            $table->integer("user_id")->comment("用户id");
            $table->decimal("order_money",10,2)->comment("订单金额");
            $table->tinyInteger("is_prop")->comment("是否使用道具");
            $table->integer("prop_id")->comment("道具id");
            $table->decimal("real_money",10,2)->comment("真实价格");
            $table->tinyInteger("pay_type")->comment("支付方式");
            $table->tinyInteger("status")->comment("支付状态");
            $table->integer("pay_time")->comment("支付时间");
            $table->tinyInteger("distribution")->comment("配送状态");
            $table->integer("address_id")->comment("收获地址id");
            $table->string("postscript",10)->comment("用户附言");
            $table->integer("completion")->comment("支付完成时间");
            $table->tinyInteger("type")->default(0)->comment("0普通用户，1团购订单，2限时抢购");
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
        Schema::dropIfExists('order');
    }
}
