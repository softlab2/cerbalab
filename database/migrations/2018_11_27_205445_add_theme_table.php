<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddThemeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('themes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->string('title', 255)->nulled()->default('');
            $table->string('h1', 255)->nulled()->default('');
            $table->string('keywords', 255)->nulled()->default('');
            $table->string('description', 255)->nulled()->default('');
            $table->string('image', 255)->nulled()->default('');
            $table->string('icon', 255)->nulled()->default('');
            $table->string('phone', 255)->nulled()->default('');
            $table->string('address', 255)->nulled()->default('');
            $table->string('email', 255)->nulled()->default('');
            $table->boolean('active', 255)->default(0);
            $table->text('template');
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
        //
    }
}
