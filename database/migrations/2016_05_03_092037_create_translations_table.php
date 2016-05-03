<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('translations_language', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('translations_category_id');
            $table->string('language');
        });

        Schema::create('translations_category', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category');
        });

        Schema::create('translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('translations_category_id');
            $table->string('key');
            $table->string('value');
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
        Schema::drop('translations');
        Schema::drop('translations_language');
        Schema::drop('translations_category');
    }
}
