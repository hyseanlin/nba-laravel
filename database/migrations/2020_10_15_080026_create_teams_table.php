<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id()->comment('編號'); // 編號
            $table->string('name', 100)->comment('名稱'); // 名稱
            $table->string('zone', 100)->comment('所屬分區'); // 所屬分區
            $table->string('city', 100)->comment('所在城市'); // 所在城市
            $table->string('home', 100)->comment('主場'); // 主場=主要球場
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
        Schema::dropIfExists('teams');
    }
}
