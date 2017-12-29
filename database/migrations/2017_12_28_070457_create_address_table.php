<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->comment("用户id");
            $table->unsignedBigInteger('phone')->comment("电话号码");
            $table->string('address',50)->comment("收货地址");
            $table->string('amply',60)->comment("详细地址");
            $table->unsignedTinyInteger('is_default')->default(1)->comment("是否默认");
            $table->string('bulid',20)->comment("标志建筑");
            $table->char('postcode', 6)->comment("邮政编码");
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
        Schema::dropIfExists('address');
    }
}
