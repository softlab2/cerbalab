<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->default('');
            $table->string('address')->default('');
            $table->string('phone')->default('');
            $table->string('description')->default('');
            $table->boolean('enabled')->default(1);
            $table->integer('user_id')->default(0);
            $table->integer('status_id')->default(0);
            $table->integer('payment_id')->default(0);
            $table->integer('delivery_id')->default(0);
            $table->integer('total');
            $table->boolean('paid')->default(0);
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
        Schema::dropIfExists('orders');
    }
}
