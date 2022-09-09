<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name')->unique()->nullable(false);
            $table->string('slug')->unique()->nullable(false);
            $table->text('description')->nullable();
            $table->string('summary')->nullable();
            $table->string('SKU')->unique();
            $table->float('price')->nullable(false);
            $table->boolean('onsale')->default(false);
            $table->boolean('public')->default(false);
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->unsignedBigInteger('inventory_id')->nullable();
            $table->foreign('inventory_id')->references('id')->on('product_inventory');
            $table->unsignedBigInteger('discount_id')->nullable();
            $table->foreign('discount_id')->references('id')->on('discounts');
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
        Schema::dropIfExists('products');
    }
}
