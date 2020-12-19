<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserGratitudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_gratitudes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->index();
            $table->integer('value');
            $table->unsignedBigInteger('receipient_id');
            $table->foreign('receipient_id')->references('id')->on('users');
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
        Schema::dropIfExists('user_gratitudes');
    }
}
