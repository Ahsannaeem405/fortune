<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePokeDtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poke_dts', function (Blueprint $table) {
            $table->id();
            $table->text('to')->nullable();
            $table->text('msg')->nullable();
            $table->text('read')->nullable();
            $table->text('status')->nullable();
            $table->foreignId('msg_id')->constrained('msgs')->onDelete('cascade');
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
        Schema::dropIfExists('poke_dts');
    }
}
