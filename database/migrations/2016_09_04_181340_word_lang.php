<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class WordLang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('word_lang', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lang');
        });

        if (Schema::hasTable('words')) {
            Schema::table('words', function (Blueprint $table) {
                $table->foreign('lang_id')->references('id')->on('word_lang');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('words')) {
            Schema::drop('words');
        }

        Schema::drop('word_lang');
    }
}
