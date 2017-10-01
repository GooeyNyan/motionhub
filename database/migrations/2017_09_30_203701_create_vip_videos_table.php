<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVipVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vip_videos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->index();
            $table->smallInteger('rank');
            $table->integer('duration');
            $table->integer('price');
            $table->text('desc');
            $table->text('image');
            $table->text('link');
            $table->text('tb_link');
            $table->string('download_link');
            $table->string('netdisk_key')->nullable();
            $table->integer('user_id');
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
        Schema::dropIfExists('vip_videos');
    }
}
