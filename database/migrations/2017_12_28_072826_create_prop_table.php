<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prop', function (Blueprint $table) {
            $table->increments('id');
            $table->char('name',30)->comment("道具名称");
            $table->decimal('full', 10, 2)->comment("满多少可用");
             $table->unsignedInteger('num')->comment("道具数量");
             $table->decimal('price', 10, 2)->comment("优惠价格");
            $table->unsignedInteger('start_time')->comment("开始时间");
            $table->unsignedInteger('end_time')->comment("结束时间");
            $table->tinyInteger('type',1)->comment("0优惠券1红包");
          $table->timestamps();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prop');
    }
}
