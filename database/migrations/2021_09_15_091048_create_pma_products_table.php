<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePmaProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('pma_products', function (Blueprint $table) {
            $table->string('product_sku', 20)->primary();
            $table->bigInteger('vendor_id')->unsigned();
            $table->foreign('vendor_id')->references('vendor_id')->on('pma_vendors');
            $table->string('name', 60);
            $table->integer('quantity');
            $table->integer('capital_price');
            $table->integer('price');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pma_products');
    }
}