<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories_post', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('post_id')->unsigned();
            $table->bigInteger('categories_id')->unsigned();
            $table->timestamps();

            $table->foreign('post_id')
            ->references('id')
            ->on('posts')
            ->onDelete('cascade');

            $table->foreign('categories_id')
            ->references('id')
            ->on('categories')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories_post');
    }
}
