<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableWordUpdates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('word_updates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('word_id');
            $table->integer('user_id');
            //by related, by situation
            $table->string('field')->nullable();
            $table->string('meaning');
            $table->string('example')->nullable();
            $table->string('example_meaning')->nullable();
            $table->string('note')->nullable();
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
        Schema::dropIfExists('word_updates');
    }
}
