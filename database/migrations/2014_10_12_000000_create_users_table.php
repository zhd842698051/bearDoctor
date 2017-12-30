<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username',30)->unique('username')->comment('用户名');
            $table->string('password',255)->comment('密码');
            $table->unsignedInteger('invite_id')->comment('邀请人id');
            $table->string('qq_auth',50)->comment('qq-open_id');
            $table->string('sina_auth',50)->comment('微博-open_id');
            $table->unsignedInteger('integral')->comment('积分');
            $table->unsignedInteger('last_time')->comment('上一次登录时间');
            $table->string('last_ip',20)->comment('上一次登录ip');
            $table->decimal('money',10,2)->comment('我的余额');
            $table->tinyInteger('grade')->comment('分销商');
            $table->decimal('spend_money',10,2)->comment('花费的金钱');
            $table->string('email',30)->comment('邮箱');
            $table->string('image',100)->comment('头像');
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
        Schema::dropIfExists('user');
    }
}
