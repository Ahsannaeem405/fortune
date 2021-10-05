<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMsgDtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('msg_dts', function (Blueprint $table) {
            $table->id();
            $table->text('to')->nullable();
            $table->text('from')->nullable();
            $table->text('msg')->nullable();
            $table->text('read_to')->nullable();
            $table->text('read_from')->nullable();
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
        Schema::dropIfExists('msg_dts');
    }
}
