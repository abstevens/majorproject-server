<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_user', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('class_id')->unsigned();

            $table->primary(['user_id', 'class_id']);

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('class_id')->references('id')->on('school_classes');

            $table->timestamps();
            $table->softDeletes();

            $table->unique(['user_id', 'class_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('class_user');
    }
}
