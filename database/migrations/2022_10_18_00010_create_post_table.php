<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post', function (Blueprint $table) {

            // fields
            $table->bigIncrements('id')->unsigned();
            $table->string('title');
            $table->string('slug')->nullable();
            $table->text('intro')->nullable();
            $table->text('content')->nullable();
            $table->string('type')->nullable();
            $table->integer('category_id')->unsigned()->nullable();
            $table->integer('is_featured')->nullable();
            $table->string('featured_image')->nullable();

            $table->string('meta_title')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_og_image')->nullable();
            $table->string('meta_og_url')->nullable();

            $table->integer('hits')->default(0)->unsigned();
            $table->integer('order')->nullable();
            $table->tinyInteger('status')->default(1);


            $table->integer('author_id')->unsigned()->nullable();

            // timestamps
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post');
    }
}
