<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeckillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seckill', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('goods_id')->comment("产品id");
            // $table->unsignedInteger('start_time')->comment("开始时间");
            // $table->unsignedInteger('end_time')->comment("结束时间");
            $table->unsignedInteger('seckill_num')->comment("秒杀数量");
            $table->unsignedInteger('seckill_stock')->comment("库存");
        
        
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
        Schema::dropIfExists('seckill');
    }
}
