<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id()->comment('編號');
            $table->string('name')->comment('姓名');
            $table->foreignId('tid')->comment('球隊編號');
            $table->date('birthdate')->default('1916-01-01')->nullable()->comment('生日');;
            $table->date('onboarddate')->default('1946-06-06')->nullable()->comment('到職日');;
            $table->string('position')->comment('位置');
            $table->float('height')->comment('身高');
            $table->float('weight')->comment('體重');
            $table->tinyInteger('year')->unsigned()->comment('年資');
            $table->string('nationality')->comment('國籍');
            $table->foreign('tid')
                ->references('id')
                ->on('teams')
                ->onDelete('cascade');
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
        Schema::dropIfExists('players');
    }
}
