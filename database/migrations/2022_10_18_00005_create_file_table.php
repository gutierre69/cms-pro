<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file', function (Blueprint $table) {

            // fields
            $table->id();
            $table->string('title');
            $table->string('file_name');
            $table->string('type');

            // timestamps
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('file_object', function (Blueprint $table) {

            // fields
            $table->integer('file_id');
            $table->integer('object_id');
            $table->string('object_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('file');
        Schema::dropIfExists('file_object');
    }
}
