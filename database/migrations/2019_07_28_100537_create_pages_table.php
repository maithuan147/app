<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title',191)->unique();
            $table->string('image');
            $table->string('description');
            $table->text('content',5000);
            $table->string('slug',191)->unique();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->tinyInteger('status')->unsigned()->default('1');
            $table->string('tembplate')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->nestedSet();

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
        Schema::dropIfExists('pages');
        Schema::table('table', function (Blueprint $table) {
            $table->dropNestedSet();
        });
    }
}
