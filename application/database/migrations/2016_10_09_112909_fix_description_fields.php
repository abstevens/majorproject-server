<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixDescriptionFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payments', function ($table) {
            $table->text('description')->change();
        });

        Schema::table('news', function ($table) {
            $table->text('description')->change();
        });

        Schema::table('events', function ($table) {
            $table->text('description')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payments', function ($table) {
            $table->string('description')->change();
        });

        Schema::table('news', function ($table) {
            $table->string('description')->change();
        });

        Schema::table('events', function ($table) {
            $table->string('description')->change();
        });
    }
}
