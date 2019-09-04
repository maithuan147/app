<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_product',191)->unique();
            $table->string('image');
            $table->integer('price_main')->unsigned()->nullable();
            $table->integer('price_sale')->unsigned()->nullable();
            $table->string('description');
            $table->text('content',5000);
            $table->string('slug',191)->unique();
            $table->bigInteger('user_id')->unsigned();
            $table->integer('view')->unsigned()->nullable();
            $table->tinyInteger('status')->unsigned()->default('1');
            $table->string('id_product')->nullable();
            $table->integer('quantity')->unsigned()->nullable();
            $table->date('date_input')->nullable();
            $table->tinyInteger('unit_weight')->unsigned()->nullable();
            $table->integer('weight')->unsigned()->nullable();
            $table->tinyInteger('unit_size')->unsigned()->nullable();
            $table->integer('size')->unsigned()->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
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
        Schema::dropIfExists('products');
    }
}
