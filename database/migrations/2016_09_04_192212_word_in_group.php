<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class WordInGroup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('word_in_group', function($table) {
            $table->increments('id', true);
            $table->integer('word_id')->unsigned();
            $table->integer('group_id')->unsigned();
        });

        Schema::table('word_in_group', function($table) {
            $table->foreign('word_id')->references('id')->on('words');
            $table->foreign('group_id')->references('id')->on('word_groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('word_in_group');
    }
}
