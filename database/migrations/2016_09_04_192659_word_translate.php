<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class WordTranslate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('word_translate', function($table) {
            $table->increments('id', true);
            $table->integer('word_first')->unsigned();
            $table->foreign('word_first')->references('id')->on('words')->onDelete('cascade');
            $table->integer('word_second')->unsigned();
            $table->foreign('word_second')->references('id')->on('words')->onDelete('cascade');
            $table->unique(array('word_first', 'word_second'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('word_translate');
    }
}
