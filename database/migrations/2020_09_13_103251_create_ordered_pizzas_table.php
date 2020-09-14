<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderedPizzasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordered_pizzas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id');
            $table->foreignId('pizza_id');
            $table->foreignId('size_id')->nullable();
            $table->foreignId('topping_id')->nullable();
            $table->integer('quantity')->default('1');
            $table->timestamps();

            $table->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onDelete('cascade');

            $table->foreign('pizza_id')
                ->references('id')
                ->on('pizzas')
                ->onDelete('cascade');

            $table->foreign('size_id')
                ->references('id')
                ->on('pizza_sizes')
                ->onDelete('cascade');

            $table->foreign('topping_id')
                ->references('id')
                ->on('pizza_toppings')
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
        Schema::dropIfExists('ordered_pizzas');
    }
}
