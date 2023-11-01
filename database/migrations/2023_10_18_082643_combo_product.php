<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::create('combo_products', function (Blueprint $table) {
            $table->string('introduce');
            $table->integer('price');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('combo_id');
            $table->timestamps();
            $table->primary(['product_id', 'combo_id']);
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('combo_id')->references('id')->on('combos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('combo_products');
    }
};
